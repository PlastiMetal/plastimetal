<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Productos')->only(['create']);
        //$this->middleware('can: Eliminar Productos')->only(['destroy']);
        //$this->middleware('can: Modificar Productos')->only(['edit']);
    }
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $productos = DB::table('producto as a')
            ->join('categoria as c', 'a.categoria_id', '=', 'c.id')
            ->select(
                'a.id',
                'a.nombre',
                'a.codigo',
                'a.stock',
                'c.categorias',
                'a.descripcion',
                'a.imagen',
                'a.estatus'
            )
            ->where(function ($query) use ($texto) {
                $query->where('a.nombre', 'LIKE', '%' . $texto . '%')
                    ->orWhere('a.codigo', 'LIKE', '%' . $texto . '%');
            })
            ->where('a.estatus', '=', 'Activo')
            ->orderBy('id', 'asc')
            ->paginate(10);

        $categorias = DB::table('categoria')->get(); // Cargar las categorías
        return view('almacen.producto.index', compact('productos', 'texto', 'categorias'));
    }

    public function create()
    {
        $categorias = DB::table('categoria')->get();
        return view("almacen.producto.create", ["categorias" => $categorias]);
    }

    public function store(ProductoFormRequest $request)
    {
        try {
            $productos = new Producto();
            $productos->categoria_id = $request->input('categoria_id');
            $productos->codigo = $request->input('codigo');
            $productos->nombre = $request->input('nombre');
            $productos->stock = $request->input('stock');
            $productos->descripcion = $request->get('descripcion');
            $productos->estatus = 'Activo';

            // Verificar y manejar la imagen
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');

                // Crear un nombre único y limpio para la imagen
                $imagenNombre = time() . '_' . Str::slug($productos->nombre) . '.' . $imagen->getClientOriginalExtension();

                // Mover la imagen a la carpeta especificada
                $imagen->move(public_path('imagenes/productos'), $imagenNombre);

                // Guardar la ruta de la imagen en el producto
                $productos->imagen = 'imagenes/productos/' . $imagenNombre;
            }

            // Guardar el producto en la base de datos
            $productos->save();

            // Redirigir con un mensaje de éxito
            return Redirect()->route("producto.index")
                ->with('success', 'Producto Creado con Éxito');
        } catch (\Exception $e) {
            // Manejar cualquier error y redirigir con un mensaje de error
            return Redirect()->route("producto.index")
                ->with('error', 'Ocurrió un error al crear el producto: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        return view("almacen.producto.show", ["producto" => Producto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        $categorias = DB::table('categoria')->where('estatus', '=', '1')->get();
        return view("almacen.producto.edit", ["producto" => $productos, "categorias" => $categorias]);
    }

    public function update(ProductoFormRequest $request, $id)
    {
        try {
            $productos = Producto::findOrFail($id);
            $productos->categoria_id = $request->input('categoria_id');
            $productos->codigo = $request->input('codigo');
            $productos->nombre = $request->input('nombre');
            $productos->stock = $request->input('stock');
            $productos->descripcion = $request->get('descripcion');

            // Manejar la actualización de la imagen
            if ($request->hasFile('imagen')) {
                // Eliminar la imagen antigua si existe
                if ($productos->imagen && file_exists(public_path($productos->imagen))) {
                    unlink(public_path($productos->imagen));
                }

                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . Str::slug($request->nombre) . '.' . $imagen->guessExtension();
                $ruta = 'imagenes/productos/';

                $imagen->move(public_path($ruta), $nombreImagen);
                $productos->imagen = $ruta . $nombreImagen;
            }

            $productos->update();

            return Redirect()->route("producto.index")
                ->with('success', 'Producto Modificado con Éxito');
        } catch (\Exception $e) {
            // Manejo de errores
            return Redirect()->route("producto.index")
                ->with('error', 'Ocurrió un error al modificar el producto: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->delete();
        return Redirect()->route("producto.index")
            ->with('success', 'Producto Eliminado con Éxito');
    }
}
