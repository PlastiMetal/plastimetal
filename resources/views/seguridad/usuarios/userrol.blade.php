@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">USUARIOS Y ROLES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Admin Usuarios</li>
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
                        <p>{{ $usuarios->name }}</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <h5>LISTA DE PERMISOS</h5>
                            {!! Form::model($usuarios, ['route' => ['asignar.update', $usuarios], 'method' => 'PUT']) !!}
                            @foreach ($role as $rol)
                                <div>
                                    <label>
                                        {{ Form::checkbox('role[]', $rol->id, $usuarios->hasAnyRole($rol->id) ?: false, ['class' => 'mr-1']) }}
                                        {{ $rol->name }}
                                    </label>
                                </div>
                            @endforeach
                            {!! Form::submit('Asignar roles', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
