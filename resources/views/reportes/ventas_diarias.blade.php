@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <h2>Reporte de Ventas</h2>
        <form action="{{ route('reportes.ventas_diarias') }}" method="GET">
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Comprobante</th>
                    <th>Total Venta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->fecha_hora }}</td>
                        <td>{{ $venta->cliente }}</td>
                        <td>{{ $venta->tipo_comprobante }} - {{ $venta->num_comprobante }}</td>
                        <td>${{ number_format($venta->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
