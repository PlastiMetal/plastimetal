<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermisoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Crear Permisos')->only(['create']);
        //$this->middleware('can: Eliminar Permisos')->only(['destroy']);
        //$this->middleware('can: Modificar Permisos')->only(['edit']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all();
        //$permisos = Permission::paginate(10);
        return view('seguridad.roles.permisos', compact('permisos'));
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
        $permisos = Permission::create(['name' => $request->input('nombre')]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
