@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE VENTAS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
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
                            <form action="{{ route('ventas.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="query"
                                                placeholder="Buscar Ingresos" value="{{ $texto ?? '' }}"
                                                aria-label="Recipien's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Ventas</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Factura')
                                                <x-adminlte-button type="button"
                                                    onclick="window.location='{{ route('ventas.create') }}'" label="Nueva Venta"
                                                    theme="primary" icon="fas fa-plus-square" class="float-right" />
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
                                        <th>Fecha Venta</th>
                                        <th>Cliente</th>
                                        <th>Comprobante</th>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $vta)
                                        <tr>
                                            <td>
                                                @can('Visualizar Factura')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        onclick="window.location='{{ route('ventas.show', $vta->id) }}'">
                                                        <i class="fas fa-binoculars" title="Visualizar Ingresos"></i>
                                                    </button>
                                                @endcan
                                                @can('Eliminar Factura')
                                                    <!--<x-adminlte-button class="btn btn-outline-danger btn-sm"
                                                                        theme="outline-danger" icon="fas fa-lg fa-trash" data-toggle="modal"
                                                                        data-target="#modal-delete-{{ $vta->id }}" />-->
                                                @endcan
                                            </td>
                                            <td>{{ $vta->fecha_hora }}</td>
                                            <td>{{ $vta->nombre }}</td>
                                            <td>{{ $vta->tipo_comprobante . ':' . $vta->num_comprobante }}</td>
                                            <td>{{ $vta->impuesto }}</td>
                                            <td>{{ $vta->total_venta }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ventas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
