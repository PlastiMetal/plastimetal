@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE USUARIOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                        </li>
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
                        <div class="col-xl-12">
                            <form action="{{ route('usuarios.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="query"
                                                placeholder="Buscar Usuarios" value="{{ $texto }}"
                                                aria-label="Recipien's username" aria-describedat="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Usuarios</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <x-adminlte-button label="Nuevos Usuarios" theme="primary"
                                                icon="fas fa-plus-square" class="float-right" data-toggle="modal"
                                                data-target="#modalPurple" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre Usuario</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $user)
                                        <tr>
                                            <td>

                                                @can('Asignar Roles')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        onclick="window.location='{{ route('asignar.edit', $user->id) }}'">
                                                        <i class="fas fa-user-shield" title="Asignar Permisos"></i>
                                                    </button>
                                                @endcan
                                                @can('Modificar Usuarios')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="modal" data-target="#modal-update-{{ $user->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan

                                                @can('Eliminar Usuarios')
                                                    <x-adminlte-button class="btn btn-outline-danger btn-sm"
                                                        theme="outline-danger" icon="fas fa-lg fa-trash" data-toggle="modal"
                                                        data-target="#modal-delete-{{ $user->id }}" />
                                                @endcan
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        @include('seguridad.usuarios.modal')
                                        @include('seguridad.usuarios.modalu')
                                        @include('seguridad.usuarios.modalue')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $usuarios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
