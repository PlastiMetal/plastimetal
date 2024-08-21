@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <h2>Reporte de Facturas por Producto</h2>

        <form method="GET" action="{{ route('reportes.facturas_por_producto') }}">
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
                <label for="productos[]">Selecciona Productos:</label>
                <select name="productos[]" class="form-control selectpicker" id="productos[]" data-live-search="true">
                    <option value="">Todos los Productos</option>
                    @foreach ($todosProductos as $producto)
                        <option value="{{ $producto->id }}"
                            {{ in_array($producto->id, old('productos', $productoIds)) ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Factura</th>
                    <th>Fecha</th>
                    <th>Cantidad Facturada</th>
                    <th>Precio Unitario</th>
                    <th>Total Recaudado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturasPorProducto as $factura)
                    <tr>
                        <td>{{ $factura->producto }}</td>
                        <td>{{ $factura->tipo_comprobante . ':' . $factura->factura }}</td>
                        <td>{{ $factura->fecha }}</td>
                        <td>{{ $factura->cantidad_facturada }}</td>
                        <td>{{ $factura->precio_unitario }}</td>
                        <td>{{ $factura->total_recaudado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
