@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PROVEEDORES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
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
                            <form action="{{ route('proveedores.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="query"
                                                placeholder="Buscar Proveedores" value="{{ $texto }}"
                                                aria-label="Recipien's username" aria-describedat="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Proveedor</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Proveedor')
                                                <x-adminlte-button label="Nuevos Proveedores" theme="primary"
                                                    icon="fas fa-plus-square" class="float-right" data-toggle="modal"
                                                    data-target="#modalPurple" />
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
                                        <th>Nombre</th>
                                        <th>Tipo Documento</th>
                                        <th>Numero Documento</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedores as $prov)
                                        <tr>
                                            <td>

                                                @can('Modificar Proveedor')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="modal" data-target="#modal-update-{{ $prov->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan

                                                @can('Eliminar Proveedor')
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal" data-target="#modal-delete-{{ $prov->id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                            <td>{{ $prov->nombre }}</td>
                                            <td>{{ $prov->tipo_documento }}</td>
                                            <td>{{ $prov->num_documento }}</td>
                                            <td>{{ $prov->direccion }}</td>
                                            <td>{{ $prov->telefono }}</td>
                                            <td>{{ $prov->email }}</td>
                                        </tr>
                                        @include('compras.proveedores.modal')
                                        @include('compras.proveedores.modalp')
                                        @include('compras.proveedores.modalpe')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $proveedores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
