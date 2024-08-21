<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Usuarios')->only(['create']);
        //$this->middleware('can: Eliminar Usuarios')->only(['destroy']);
        //$this->middleware('can: Modificar Usuarios')->only(['edit']);
    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $usuarios = DB::table('users')
                ->where('name', 'LIKE', '%' . $query . '%')
                ->Where('estatus', '=', '1')
                ->orderBy('id', 'desc')
                ->paginate(5);
            return view('seguridad.usuarios.index', ["usuarios" => $usuarios, "texto" => $query]);
        }
    }

    public function create()
    {
        return view("seguridad.usuarios.create");
    }

    public function store(request $request)
    {
        $usuarios = new User();
        $usuarios->name = $request->get('nombre');
        $usuarios->email = $request->get('email');
        $usuarios->password = bcrypt($request->get('password'));
        $usuarios->estatus = '1';
        $usuarios->save();
        return Redirect()->route("usuarios.index")
            ->with('Success', 'Categoría Creado con Éxito');
    }

    public function edit($id)
    {
        $usuarios = User::findOrFail($id);
        return view("seguridad.usuarios.edit", ["usuarios" => $usuarios]);
    }

    public function update(request $request, $id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->name = $request->get('nombre');
        $usuarios->email = $request->get('email');
        $usuarios->password = bcrypt($request->get('password'));
        $usuarios->update();
        return Redirect()->route("usuarios.index")
            ->with('Success', 'Categoría Modificada con Éxito');
    }
    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->delete();
        return Redirect()->route("usuarios.index")
            ->with('Success', 'Categoría Eliminada con Éxito');
    }
}
