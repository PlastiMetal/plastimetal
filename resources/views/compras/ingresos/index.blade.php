@extends('layouts.admin')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE INGRESOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Ingresos</li>
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
                            <form action="{{ route('ingresos.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="query"
                                                placeholder="Buscar Ingresos" value="{{ $texto ?? '' }}"
                                                aria-label="Recipien's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Buscar Ingresos</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            @can('Crear Productos')
                                                <x-adminlte-button type="button"
                                                    onclick="window.location='{{ route('ingresos.create') }}'"
                                                    label="Nuevo Ingreso" theme="primary" icon="fas fa-plus-square"
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
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Fecha Ingreso</th>
                                        <th>Proveedor</th>
                                        <th>Comprobante</th>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ingresos as $ing)
                                        <tr>
                                            <td>
                                                @can('Visualizar Ingresos')
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        onclick="window.location='{{ route('ingresos.show', $ing->id) }}'">
                                                        <i class="fas fa-binoculars" title="Visualizar Ingresos"></i>
                                                    </button>
                                                @endcan
                                                <!--<button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal" data-target="#">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>-->
                                            </td>
                                            <td>{{ $ing->fecha_hora }}</td>
                                            <td>{{ $ing->nombre }}</td>
                                            <td>{{ $ing->tipo_comprobante . ':' . $ing->num_comprobante }}</td>
                                            <td>{{ $ing->impuesto }}</td>
                                            <td>{{ $ing->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ingresos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
