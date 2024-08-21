@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ROLES Y PERMISOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Roles y Permisos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p>{{ $role->name }}</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <h5>LISTA DE PERMISOS</h5>
                            {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}
                            @foreach ($permisos as $permiso)
                                <div>
                                    <label>
                                        {{ Form::checkbox('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ?: false, ['class' => 'mr-1']) }}
                                        {{ $permiso->name }}
                                    </label>
                                </div>
                            @endforeach
                            {!! Form::submit('Asignar permisos', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
