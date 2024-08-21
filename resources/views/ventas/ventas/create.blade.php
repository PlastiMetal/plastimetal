@extends('layouts.admin')

@section('contenido')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">NUEVA VENTA</h3>
            </div>

            <form action="{{ route('ventas.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <select name="cliente_id" class="form-control selectpicker" id="cliente_id"
                                    data-live-search="true">
                                    @foreach ($personas as $per)
                                        <option value="{{ $per->id }}">{{ $per->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tipo_comprobante">Tipo Documento</label>
                                <select name="tipo_comprobante" class="form-control" id="tipo_comprobante">
                                    <option value="CCF">CCF</option>
                                    <option value="FAC">FAC</option>
                                    <option value="NC">NC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="num_comprobante">Número de Documento</label>
                                <input type="text" class="form-control" name="num_comprobante" id="num_comprobante"
                                    placeholder="Ingresa el Número de Documento">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label for="producto_id">Productos</label>
                                <select name="producto_id" class="form-control selectpicker" id="producto_id"
                                    data-live-search="true">
                                    @foreach ($productos as $prod)
                                        <option
                                            value="{{ $prod->id }}_{{ $prod->stock }}_{{ $prod->precio_promedio }}">
                                            {{ $prod->articulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" id="cantidad"
                                    placeholder="Cantidad Producto">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" disabled class="form-control" name="stock" id="stock"
                                    placeholder="Stock">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pprecio_venta">Precio Venta</label>
                                <input type="number" disabled class="form-control" name="precio_venta" id="precio_venta"
                                    step="0.01" min="0" placeholder="Precio Venta">
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="form-group">
                                <label for="descuento">Descuento</label>
                                <input type="number" class="form-control" name="descuento" id="descuento" step="0.01"
                                    min="0" placeholder="Descuento" value="0.00">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="accion">Acción</label>
                                <button type="button" id="btn_add"
                                    class="btn btn-block btn-outline-success">Agregar</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="detalles" class="table table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Venta</th>
                                                <th>Descuento</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h4 id="total">$ 0.00</h4>
                                                <input type="hidden" name="total_venta" id="total_venta">
                                            </th>
                                        </tfoot>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="card-footer">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-success me-1 mb-1" id="btn_guardar">Guardar</button>
                            <a href="{{ route('ventas.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#btn_add").click(function() {
                    agregar();
                });
            });

            $('#btn_guardar').click(function() {
                swal({
                    title: "Su Cambio es de!",
                    text: "Gracias por su compra",
                    type: "success",
                })
            })

            let cont = 0;
            let total = 0;
            let subtotal = [];

            $("#guardar").hide();
            $("#producto_id").change(mostrarValores);

            function mostrarValores() {
                const datosArticulo = document.getElementById("producto_id").value.split("_");
                $("#precio_venta").val(datosArticulo[2]); // Asegúrate de que el ID del campo sea correcto.
                $("#stock").val(datosArticulo[1]); // Cambiado de .html a .val para asegurarse de que se actualiza el valor.
            }


            function agregar() {
                const datosArticulo = document.getElementById("producto_id").value.split("_");

                const idarticulo = datosArticulo[0];
                const articulo = $("#producto_id option:selected").text();
                const cantidad = parseInt($("#cantidad").val());
                const descuento = $("#descuento").val();
                const precio_venta = $("#precio_venta").val();
                const stock = parseInt($("#stock").val());
                const unidad = datosArticulo[3];

                if (idarticulo && cantidad > 0 && precio_venta) {
                    let cantidadfinal = (unidad === 'kilos') ? cantidad * 1000 : cantidad;

                    if (cantidadfinal <= stock) {
                        let subtotal = cantidad * precio_venta - descuento;
                        total += subtotal;

                        const fila = `<tr class="selected" id="fila${cont}">
                    <td><button type="button" class="btn btn-warning" onclick="eliminar(${cont});">X</button></td>
                    <td><input type="hidden" name="producto_id[]" value="${idarticulo}">${articulo}</td>
                    <td><input type="number" name="cantidad[]" value="${cantidad}"></td>
                    <td><input type="number" name="precio_venta[]" value="${precio_venta}"></td>
                    <td><input type="number" name="descuento[]" value="${descuento}"></td>
                    <td>${subtotal.toFixed(2)}</td>
                </tr>`;

                        cont++;
                        limpiar();
                        $("#total").html(`$ ${total.toFixed(2)}`);
                        $("#total_venta").val(total.toFixed(2));
                        evaluar();
                        $('#detalles').append(fila);

                    } else {
                        alert("La Cantidad a Vender Supera el Stock");
                    }
                } else {
                    alert("Error al Ingresar el Detalle de la Venta, Revise los Datos del Artículo");
                }
            }


            function limpiar() {
                $("#cantidad").val("");
                $("#descuento").val("");
                $("#precio_venta").val("");
            }

            function evaluar() {
                if (total > 0) {
                    $("#guardar").show();
                } else {
                    $("#guardar").hide();
                }
            }

            function eliminar(index) {
                total -= subtotal[index];
                $("#total").html("$: ${total}");
                $("#total_venta").val(total);
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endpush
@endsection
