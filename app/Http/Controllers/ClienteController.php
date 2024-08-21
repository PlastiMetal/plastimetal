<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Clientes')->only(['create']);
        //$this->middleware('can: Eliminar Clientes')->only(['destroy']);
        //$this->middleware('can: Modificar Clientes')->only(['edit']);
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $clientes = DB::table('persona')
                ->where('tipo_persona', '=', 'Cliente')
                ->where('tipo_persona', 'LIKE', '%' . $query . '%')
                ->Where('estatus', '=', '1')
                ->orderBy('id', 'asc')
                ->paginate(10);
            return view('ventas.clientes.index', ["clientes" => $clientes, "texto" => $query]);
        }
    }

    public function create()
    {
        return view("ventas.clientes.create");
    }

    public function store(ClienteFormRequest $request)
    {
        $clientes = new Cliente();
        $clientes->tipo_persona = $request->input('tipo_persona');
        $clientes->nombre = $request->input('nombre');
        $clientes->tipo_documento = $request->input('tipo_documento');
        $clientes->num_documento = $request->input('num_documento');
        $clientes->direccion = $request->input('direccion');
        $clientes->telefono = $request->input('telefono');
        $clientes->email = $request->input('email');
        $clientes->estatus = '1';
        $clientes->save();
        return Redirect()->route("clientes.index")
            ->with('Success', 'Cliente Creado con Éxito');
    }

    public function show($id)
    {
        return view("ventas.clientes.show", ["clientes" => cliente::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("ventas.clientes.edit", ["clientes" => cliente::findOrFail($id)]);
    }

    public function update(ClienteFormRequest $request, $id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->tipo_persona = $request->get('tipo_persona');
        $clientes->nombre = $request->get('nombre');
        $clientes->tipo_documento = $request->get('tipo_documento');
        $clientes->num_documento = $request->get('num_documento');
        $clientes->direccion = $request->get('direccion');
        $clientes->telefono = $request->get('telefono');
        $clientes->email = $request->get('email');
        $clientes->estatus = '1';
        $clientes->update();
        return Redirect()->route("clientes.index")
            ->with('Success', 'Cliente Modificado con Éxito');
    }

    public function destroy($id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->delete();
        return Redirect()->route("clientes.index")
            ->with('Success', 'Cliente Eliminado con Éxito');
    }
}
