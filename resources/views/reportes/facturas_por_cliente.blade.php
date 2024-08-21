@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <h2>Reporte de Facturas por Cliente</h2>

        <form method="GET" action="{{ route('reportes.facturas_por_cliente') }}">
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"
                    value="{{ old('fecha_inicio', $fechaInicio) }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control"
                    value="{{ old('fecha_fin', $fechaFin) }}" required>
            </div>
            <div class="form-group">
                <label for="cliente_id">Selecciona Cliente:</label>
                <select name="cliente_id" class="form-control selectpicker" id="cliente_id" data-live-search="true">
                    <option value="">Todos los Clientes</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ old('cliente_id', $clienteId) == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Factura</th>
                    <th>Fecha</th>
                    <th>Total Recaudado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturasPorCliente as $factura)
                    <tr>
                        <td>{{ $factura->cliente }}</td>
                        <td>{{ $factura->tipo_comprobante . ':' . $factura->factura }}</td>
                        <td>{{ $factura->fecha }}</td>
                        <td>{{ $factura->total_recaudado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
