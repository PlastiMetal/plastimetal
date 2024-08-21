<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can: Crear Categorias')->only(['create']);
        $this->middleware('can: Eliminar Categorias')->only(['destroy']);
        $this->middleware('can: Modificar Categorias')->only(['edit']);
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $categorias = DB::table('categoria')
                ->where('categorias', 'LIKE', '%' . $query . '%')
                ->Where('estatus', '=', '1')
                ->orderBy('id', 'asc')
                ->paginate(10);
            return view('almacen.categoria.index', compact('categorias', 'query'));
        }
    }

    public function create()
    {
        $categorias = Categoria::all();

        // Retornar la vista y pasarle las categorías
        return view('almacen.categoria.create', compact('categorias'));
        //return view("almacen.categoria.create");
    }

    public function store(CategoriaFormRequest $request)
    {
        $categorias = new categoria();
        $categorias->categorias = $request->get('categorias');
        $categorias->descripcion = $request->get('descripcion');
        $categorias->estatus = '1';
        $categorias->save();
        return Redirect()->route("categoria.index")
            ->with('Success', 'Categoría Creado con Éxito');
    }

    public function show($id)
    {
        return view("almacen.categoria.show", ["categorias" => Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.categoria.edit", ["categorias" => Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $categorias = Categoria::findOrFail($id);
        $categorias->categorias = $request->get('categorias');
        $categorias->descripcion = $request->get('descripcion');
        $categorias->update();
        return Redirect()->route("categoria.index")
            ->with('Success', 'Categoría Modificada con Éxito');
    }

    public function destroy($id)
    {
        $categorias = categoria::findOrFail($id);
        $categorias->delete();
        return Redirect()->route("categoria.index")
            ->with('Success', 'Categoría Eliminada con Éxito');
    }
}
