<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\VentaFormRequest;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        //$this->middleware('can: Crear Ventas')->only(['create']);
        //$this->middleware('can: Eliminar Ventas')->only(['destroy']);
        //$this->middleware('can: Modificar Ventas')->only(['edit']);
        //$this->middleware('can: Visualizar Ventas')->only(['show']);
    }

    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('texto'));
            $ventas = DB::table('venta as v')
                ->join('persona as p', 'v.cliente_id', '=', 'p.id')
                ->join('detalle_venta as dv', 'dv.venta_id', '=', 'v.id')
                ->select(
                    'v.id',
                    'v.fecha_hora',
                    'p.nombre',
                    'v.tipo_comprobante',
                    'v.num_comprobante',
                    'v.impuesto',
                    'v.estatus',
                    'v.total_venta',
                )
                ->where('v.num_comprobante', 'LIKE', '%' . $query . '%')
                ->orderBy('v.id', 'desc')
                ->groupBy('v.id', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.total_venta', 'v.estatus')
                ->paginate(15);
            return view("ventas.ventas.index", ["ventas" => $ventas, "texto" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona', '=', 'cliente')->get();
        $productos = DB::table('producto as p')
            ->join('detalle_ingreso as di', 'di.producto_id', '=', 'p.id')
            ->select(
                DB::raw('CONCAT(p.codigo," ",p.nombre) AS articulo'),
                'p.id',
                'p.stock',
                DB::raw('avg(di.precio_venta) as precio_promedio')
            )
            ->where('p.estatus', '=', 'Activo')
            ->where('p.stock', '>', '0')
            ->groupBy('articulo', 'p.id', 'p.stock')
            ->get();
        return view("ventas.ventas.create", ["personas" => $personas, "productos" => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ventas = new Venta();
            $ventas->cliente_id = $request->get('cliente_id');
            $ventas->tipo_comprobante = $request->get('tipo_comprobante');
            $ventas->num_comprobante = $request->get('num_comprobante');
            $ventas->fecha_hora = Carbon::now('America/El_Salvador')->toDateTimeString();
            $ventas->impuesto = '13';
            $ventas->estatus = 'A';

            // Aquí calculas el total de la venta
            $total_venta = 0;
            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $precio_venta = $request->get('precio_venta');

            for ($i = 0; $i < count($producto_id); $i++) {
                $total_venta += $cantidad[$i] * $precio_venta[$i];
            }

            $ventas->total_venta = $total_venta;

            $ventas->save();

            // Guardar los detalles de la venta
            for ($i = 0; $i < count($producto_id); $i++) {
                $detalle = new DetalleVenta();
                $detalle->venta_id = $ventas->id;
                $detalle->producto_id = $producto_id[$i];
                $detalle->cantidad = $cantidad[$i];
                $detalle->precio_venta = $precio_venta[$i];
                $detalle->descuento = $request->get('descuento')[$i] ?? 0;
                $detalle->save();
            }

            DB::commit();

            return Redirect::to('ventas/ventas');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error en la transacción de venta: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return Redirect::to('ventas/ventas')->withErrors('Error al guardar la venta: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ventas = DB::table('venta as v')
            ->join('persona as p', 'v.cliente_id', '=', 'p.id')
            ->join('detalle_venta as dv', 'v.id', '=', 'dv.venta_id') // Corregido aquí
            ->select(
                'v.id',
                'v.fecha_hora',
                'p.nombre',
                'v.tipo_comprobante',
                'v.num_comprobante',
                'v.impuesto',
                'v.estatus',
                'v.total_venta',
            )
            ->where('v.id', '=', $id)
            ->first();

        $detalles = DB::table('detalle_venta as dv')
            ->join('producto as p', 'dv.producto_id', '=', 'p.id')
            ->select(
                'p.nombre as producto',
                'dv.cantidad',
                'dv.descuento',
                'dv.precio_venta'
            )
            ->where('dv.venta_id', '=', $id) // Corregido aquí
            ->get();

        return view("ventas.ventas.show", ["ventas" => $ventas, "detalles" => $detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $ventas = Venta::findOrFail($id);
        $ventas->delete();
        return Redirect::to('ventas/ventas');
    }

    public function reporteVentas(Request $request)
    {
        $fechaInicio = $request->get('fecha_inicio');
        $fechaFin = $request->get('fecha_fin');

        $ventas = DB::table('venta as v')
            ->join('persona as p', 'v.cliente_id', '=', 'p.id')
            ->join('detalle_venta as dv', 'dv.venta_id', '=', 'v.id')
            ->select(
                'v.id',
                'v.fecha_hora',
                'p.nombre as cliente',
                'v.tipo_comprobante',
                'v.num_comprobante',
                'v.impuesto',
                'v.total_venta',
                DB::raw('sum(dv.cantidad * dv.precio_venta - dv.descuento) as total')
            )
            ->whereBetween('v.fecha_hora', [$fechaInicio, $fechaFin])
            ->groupBy('v.id', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.total_venta')
            ->orderBy('v.fecha_hora', 'desc')
            ->get();

        return view('reportes.ventas_diarias', compact('ventas', 'fechaInicio', 'fechaFin'));
    }

    public function reportePorProducto(Request $request)
    {
        $fechaInicio = $request->get('fecha_inicio');
        $fechaFin = $request->get('fecha_fin');
        $productoNombre = $request->get('producto_nombre'); // Nuevo parámetro para búsqueda

        // Consulta para obtener todos los productos disponibles para el filtro
        $productosDisponibles = DB::table('producto')->select('id', 'nombre')->get();

        // Consulta para obtener los productos vendidos en el rango de fechas especificado
        $query = DB::table('detalle_venta as dv')
            ->join('producto as p', 'dv.producto_id', '=', 'p.id')
            ->join('venta as v', 'dv.venta_id', '=', 'v.id')
            ->select(
                'p.nombre as producto',
                'p.stock',
                DB::raw('SUM(dv.cantidad) as cantidad_vendida'),
                DB::raw('SUM(dv.cantidad * dv.precio_venta - dv.descuento) as total_recaudado')
            )
            ->whereBetween('v.fecha_hora', [$fechaInicio, $fechaFin]);

        // Aplicar filtro por nombre de producto si se proporciona
        if (!empty($productoNombre)) {
            $query->where('p.nombre', 'LIKE', '%' . $productoNombre . '%');
        }

        $productosVendidos = $query
            ->groupBy('p.nombre', 'p.stock')
            ->orderBy('cantidad_vendida', 'desc')
            ->get();

        return view('reportes.productos_vendidos', compact('productosVendidos', 'fechaInicio', 'fechaFin', 'productosDisponibles', 'productoNombre'));
    }



    public function reportePorCliente(Request $request)
    {
        // Obtener fechas de la solicitud, sin mantenerlas en sesión
        $fechaInicio = $request->get('fecha_inicio');
        $fechaFin = $request->get('fecha_fin');
        $clienteId = $request->get('cliente_id');

        // Consulta para obtener el total de ventas por cliente
        $query = DB::table('venta as v')
            ->join('persona as p', 'v.cliente_id', '=', 'p.id')
            ->join('detalle_venta as dv', 'v.id', '=', 'dv.venta_id')
            ->select(
                'p.nombre as cliente',
                DB::raw('SUM(dv.cantidad * dv.precio_venta - dv.descuento) as total_vendido')
            )
            ->whereBetween('v.fecha_hora', [$fechaInicio, $fechaFin]);

        if (!empty($clienteId)) {
            $query->where('p.id', $clienteId);
        }

        $ventasPorCliente = $query
            ->groupBy('p.nombre')
            ->orderBy('p.nombre')
            ->get();

        $clientes = DB::table('persona')
            ->where('tipo_persona', 'Cliente')
            ->get();

        return view('reportes.ventas_por_cliente', compact('ventasPorCliente', 'fechaInicio', 'fechaFin', 'clienteId', 'clientes'));
    }

    public function reporteFacturasPorCliente(Request $request)
    {
        $fechaInicio = $request->get('fecha_inicio', session('fecha_inicio'));
        $fechaFin = $request->get('fecha_fin', session('fecha_fin'));
        $clienteId = $request->get('cliente_id');

        // Guardar fechas en la sesión para mantenerlas
        session(['fecha_inicio' => $fechaInicio, 'fecha_fin' => $fechaFin]);

        // Consulta para obtener las facturas por cliente
        $query = DB::table('venta as v')
            ->join('persona as p', 'v.cliente_id', '=', 'p.id')
            ->join('detalle_venta as dv', 'v.id', '=', 'dv.venta_id')
            ->select(
                'p.nombre as cliente',
                'v.tipo_comprobante as tipo_comprobante',
                'v.num_comprobante as factura',
                'v.fecha_hora as fecha',
                DB::raw('SUM(dv.cantidad * dv.precio_venta - dv.descuento) as total_recaudado')
            )
            ->whereBetween('v.fecha_hora', [$fechaInicio, $fechaFin]);

        if (!empty($clienteId)) {
            $query->where('p.id', $clienteId);
        }

        $facturasPorCliente = $query
            ->groupBy('p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.fecha_hora')
            ->orderBy('p.nombre')
            ->orderBy('v.fecha_hora')
            ->get();

        $clientes = DB::table('persona')
            ->where('tipo_persona', 'Cliente')
            ->get();

        return view('reportes.facturas_por_cliente', compact('facturasPorCliente', 'fechaInicio', 'fechaFin', 'clienteId', 'clientes'));
    }


    public function reporteFacturasPorProducto(Request $request)
    {
        $fechaInicio = $request->get('fecha_inicio', session('fecha_inicio'));
        $fechaFin = $request->get('fecha_fin', session('fecha_fin'));
        $productoIds = $request->get('productos', []);

        // Guardar fechas en la sesión para mantenerlas
        session(['fecha_inicio' => $fechaInicio, 'fecha_fin' => $fechaFin]);

        // Consulta para obtener las facturas por producto
        $query = DB::table('venta as v')
            ->join('detalle_venta as dv', 'v.id', '=', 'dv.venta_id')
            ->join('producto as p', 'dv.producto_id', '=', 'p.id')
            ->select(
                'p.nombre as producto',
                'v.tipo_comprobante as tipo_comprobante',
                'v.num_comprobante as factura',
                'v.fecha_hora as fecha',
                DB::raw('SUM(dv.cantidad) as cantidad_facturada'),
                DB::raw('AVG(dv.precio_venta) as precio_unitario'),
                DB::raw('SUM(dv.cantidad * dv.precio_venta - dv.descuento) as total_recaudado')
            )
            ->whereBetween('v.fecha_hora', [$fechaInicio, $fechaFin]);

        if (!empty($productoIds)) {
            $query->whereIn('dv.producto_id', $productoIds);
        }

        $facturasPorProducto = $query
            ->groupBy('p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.fecha_hora')
            ->orderBy('p.nombre')
            ->orderBy('v.fecha_hora')
            ->get();

        $todosProductos = DB::table('producto')->get();

        return view('reportes.facturas_por_producto', compact('facturasPorProducto', 'fechaInicio', 'fechaFin', 'productoIds', 'todosProductos'));
    }
}
