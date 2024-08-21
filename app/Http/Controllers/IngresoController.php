<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\IngresoFormRequest;
use App\Models\Ingreso;
use App\Models\DetalleIngreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Support\Responsable;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        //$this->middleware('can: Crear Ingresos')->only(['create']);
        //$this->middleware('can: Eliminar Ingresos')->only(['destroy']);
        //$this->middleware('can: Modificar Ingresos')->only(['edit']);
        //$this->middleware('can: Visualizar Ingresos')->only(['show']);
    }

    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('texto'));
            $ingresos = DB::table('ingreso as i')
                ->join('persona as p', 'i.proveedor_id', '=', 'p.id')
                ->join('detalle_ingreso as di', 'di.ingreso_id', '=', 'i.id')
                ->select(
                    'i.id',
                    'i.fecha_hora',
                    'p.nombre',
                    'i.tipo_comprobante',
                    'i.num_comprobante',
                    'i.impuesto',
                    'i.estatus',
                    DB::raw('sum(di.cantidad*di.precio_compra) as total'),
                )
                ->where('i.num_comprobante', 'LIKE', '%' . $query . '%')
                ->groupBy('i.id', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estatus')
                ->orderBy('i.id', 'desc')
                ->paginate(15);
            return view("compras.ingresos.index", ["ingresos" => $ingresos, "texto" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona', '=', 'proveedor')->get();
        $ingresos = Ingreso::all();
        $productos = DB::table('producto as p')
            ->select(DB::raw('CONCAT(p.codigo," ",p.nombre) AS articulo'), 'p.id', 'p.stock')
            ->where('p.estatus', '=', 'Activo')
            ->get();
        return view("compras.ingresos.create", ["personas" => $personas, "productos" => $productos, "ingresos" => $ingresos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ingresos = new Ingreso();
            $ingresos->proveedor_id = $request->get('proveedor_id');
            $ingresos->tipo_comprobante = $request->get('tipo_comprobante');
            $ingresos->num_comprobante = $request->get('num_comprobante');
            $mytime = Carbon::now('America/El_Salvador');
            $ingresos->fecha_hora = $mytime->toDateTimeString();
            $ingresos->impuesto = '13';
            $ingresos->estatus = 'A';
            $ingresos->save();

            $producto_id = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while ($cont < count($producto_id)) {

                $detalle = new DetalleIngreso();
                $detalle->ingreso_id = $ingresos->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return Redirect::to('compras/ingresos');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ingresos = DB::table('ingreso as i')
            ->join('persona as p', 'i.proveedor_id', '=', 'p.id')
            ->join('detalle_ingreso as di', 'i.id', '=', 'di.ingreso_id') // Corregido aquí
            ->select(
                'i.id',
                'i.fecha_hora',
                'p.nombre',
                'i.tipo_comprobante',
                'i.num_comprobante',
                'i.impuesto',
                'i.estatus',
                DB::raw('sum(di.cantidad*di.precio_compra) as total')
            )
            ->where('i.id', '=', $id)
            ->groupBy('i.id', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estatus')
            ->orderBy('i.id', 'desc')
            ->first();

        $detalles = DB::table('detalle_ingreso as d')
            ->join('producto as p', 'd.producto_id', '=', 'p.id')
            ->select(
                'p.nombre as producto',
                'd.cantidad',
                'd.precio_compra',
                'd.precio_venta'
            )
            ->where('d.ingreso_id', '=', $id) // Corregido aquí
            ->get();

        return view("compras.ingresos.show", ["ingresos" => $ingresos, "detalles" => $detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $ingresos = Ingreso::findOrFail($id);
        $ingresos->delete();
        return Redirect::to('compras/ingresos');
    }
}
