<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Roles')->only(['create']);
        //$this->middleware('can: Eliminar Roles')->only(['destroy']);
        //$this->middleware('can: Modificar Roles')->only(['edit']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        return view('seguridad.roles.roles', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("seguridad.roles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = Role::create(['name' => $request->input('nombre')]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener el rol por ID
        $role = Role::findOrFail($id);

        // Obtener los permisos asociados al rol
        $permisos = $role->permissions; // Asumiendo que tienes una relación definida en el modelo Role

        // Pasar las variables a la vista
        return view('seguridad.roles.rolepermiso', compact('role', 'permisos'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('seguridad.roles.rolepermiso', compact('role', 'permisos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->input('permisos'));
        return redirect()->route('roles.index', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
