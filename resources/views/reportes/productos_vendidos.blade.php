@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <h2>Reporte de Productos Vendidos</h2>

        <form action="{{ route('reportes.productos_vendidos') }}" method="GET">
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $fechaInicio }}">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $fechaFin }}">
            </div>
            <div class="form-group">
                <label for="producto_nombre">Nombre del Producto:</label>
                <select name="producto_nombre" class="form-control selectpicker" id="producto_nombre"
                    data-live-search="true">
                    <option value="">Todos los Productos</option>
                    @foreach ($productosDisponibles as $producto)
                        <option value="{{ $producto->nombre }}"
                            {{ $productoNombre == $producto->nombre ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Cantidad Vendida</th>
                    <th>Total Recaudado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosVendidos as $producto)
                    <tr>
                        <td>{{ $producto->producto }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->cantidad_vendida }}</td>
                        <td>{{ $producto->total_recaudado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
