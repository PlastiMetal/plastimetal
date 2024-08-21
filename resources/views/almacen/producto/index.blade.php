@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            <form action="{{ route('producto.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="texto"
                                                placeholder="Buscar Productos" value="{{ $texto }}"
                                                aria-label="Recipien's username" aria-describedat="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Producto</button>
                                        </div>
                                    </div>

                                    <!--<x-adminlte-button label="Nuevos Productos" theme="primary" icon="fas fa-plus-square"
                                                                                                            class="float-right" data-toggle="modal" data-target="#modalPurple" />-->

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Productos')
                                                <x-adminlte-button type="button"
                                                    onclick="window.location='{{ route('producto.create') }}'"
                                                    label="Nuevos Productos" theme="primary" icon="fas fa-plus-square"
                                                    class="float-right" />
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
                            <table class="table table-hover mb-0" text-align="center">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Descripcion</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $prod)
                                        <tr>
                                            <td>
                                                @can('Modificar Productos')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        onclick="window.location='{{ route('producto.edit', $prod->id) }}'">
                                                        <i class="fas fa-edit" title="Editar Productos"></i>
                                                    </button>
                                                @endcan
                                                @can('Eliminar Productos')
                                                    <x-adminlte-button class="btn btn-outline-danger btn-sm"
                                                        theme="outline-danger" icon="fas fa-lg fa-trash" data-toggle="modal"
                                                        data-target="#modal-delete-{{ $prod->id }}" />
                                                @endcan
                                            </td>
                                            <td>{{ $prod->codigo }}</td>
                                            <td>{{ $prod->nombre }}</td>
                                            <td>{{ $prod->descripcion }}</td>
                                            <td>{{ $prod->stock }}</td>
                                            <td><img src="{{ asset($prod->imagen) }}" alt="{{ $prod->nombre }}"
                                                    width="100px">
                                                <br>{{ asset($prod->imagen) }}
                                            </td>

                                            <td>{{ $prod->categorias }}</td>
                                        </tr>
                                        @include('almacen.producto.modal')
                                        <!--@include('almacen.producto.modalpr', ['categorias' => $categorias])-->
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $productos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
