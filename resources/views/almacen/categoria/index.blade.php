@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE CATEGORIAS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Categorías</li>
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
                            <form action="{{ route('categoria.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="query"
                                                placeholder="Buscar Categorias" value="{{ $query }}"
                                                aria-label="Recipien's username" aria-describedat="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Categoría</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Categorias')
                                                <x-adminlte-button label="Nuevas Categorías" theme="primary"
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
                                        <th>Nombre Categoría</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $cat)
                                        <tr>
                                            <td>
                                                @can('Modificar Categorias')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="modal" data-target="#modal-update-{{ $cat->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan
                                                @can('Eliminar Categorias')
                                                    <x-adminlte-button class="btn btn-outline-danger btn-sm"
                                                        theme="outline-danger" icon="fas fa-lg fa-trash" data-toggle="modal"
                                                        data-target="#modal-delete-{{ $cat->id }}" />
                                                @endcan
                                            </td>
                                            <td>{{ $cat->categorias }}</td>
                                            <td>{{ $cat->descripcion }}</td>
                                        </tr>
                                        @include('almacen.categoria.modal')
                                        @include('almacen.categoria.modalc')
                                        @include('almacen.categoria.modalce')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categorias->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
