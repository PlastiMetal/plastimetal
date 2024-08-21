@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PERMISOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Permisos</li>
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
                            <form action="{{ route('permisos.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Permisos')
                                                <x-adminlte-button label="Nuevos Permisos" theme="primary" icon="fas fa-key"
                                                    class="float-right" data-toggle="modal" data-target="#modalPurple" />
                                            @endcan
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
                                        <th>Permisos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permi)
                                        <tr>
                                            <td>
                                                @can('Modificar Permisos')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="modal" data-target="#modal-update-{{ $permi->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan

                                                @can('Eliminar Permisos')
                                                    <!--<button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal" data-target="#modal-delete-{{ $permi->id }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>-->
                                                @endcan
                                            </td>
                                            <td>{{ $permi->name }}</td>
                                        </tr>
                                        @include('seguridad.roles.modalps')
                                        @include('seguridad.roles.modalpse')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
