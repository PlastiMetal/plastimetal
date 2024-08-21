<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Proveedores')->only(['create']);
        //$this->middleware('can: Eliminar Proveedores')->only(['destroy']);
        //$this->middleware('can: Modificar Proveedores')->only(['edit']);
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $proveedores = DB::table('persona')
                ->where('tipo_persona', '=', 'Proveedor')
                ->where('tipo_persona', 'LIKE', '%' . $query . '%')
                ->Where('estatus', '=', '1')
                ->orderBy('id', 'asc')
                ->paginate(10);
            return view('compras.proveedores.index', ["proveedores" => $proveedores, "texto" => $query]);
        }
    }

    public function create()
    {
        return view("compras.proveedores.create");
    }

    public function store(ProveedorFormRequest $request)
    {
        $proveedores = new Proveedor();
        $proveedores->tipo_persona = $request->input('tipo_persona');
        $proveedores->nombre = $request->input('nombre');
        $proveedores->tipo_documento = $request->input('tipo_documento');
        $proveedores->num_documento = $request->input('num_documento');
        $proveedores->direccion = $request->input('direccion');
        $proveedores->telefono = $request->input('telefono');
        $proveedores->email = $request->input('email');
        $proveedores->estatus = '1';
        $proveedores->save();
        return Redirect()->route("proveedores.index")
            ->with('Success', 'Proveedor Creado con Éxito');
    }

    public function show($id)
    {
        return view("compras.proveedores.show", ["proveedores" => Proveedor::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("compras.proveedores.edit", ["proveedores" => proveedor::findOrFail($id)]);
    }

    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->tipo_persona = $request->get('tipo_persona');
        $proveedores->nombre = $request->get('nombre');
        $proveedores->tipo_documento = $request->get('tipo_documento');
        $proveedores->num_documento = $request->get('num_documento');
        $proveedores->direccion = $request->get('direccion');
        $proveedores->telefono = $request->get('telefono');
        $proveedores->email = $request->get('email');
        $proveedores->estatus = '1';
        $proveedores->update();
        return Redirect()->route("proveedores.index")
            ->with('Success', 'Proveedor Modificado con Éxito');
    }

    public function destroy($id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->delete();
        return Redirect()->route("proveedores.index")
            ->with('Success', 'Proveedor Eliminado con Éxito');
    }
}
