@extends('layouts.admin')

@section('contenido')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">NUEVO INGRESO</h3>
            </div>

            <form action="{{ route('ingresos.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor_id" class="form-control selectpicker" id="proveedor_id"
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
                                    <option value="DTE">DTE</option>
                                    <option value="DUCA">DUCA</option>
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

                        <div class="col-4">
                            <div class="form-group">
                                <label for="pidproducto">Productos</label>
                                <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo"
                                    data-live-search="true">
                                    @foreach ($productos as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->articulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="pcantidad" id="pcantidad"
                                    placeholder="Cantidad Producto">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pcompra">Precio Compra</label>
                                <input type="number" class="form-control" name="pprecio_compra" id="pprecio_compra"
                                    step="0.01" min="0" placeholder="Precio Compra">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pventa">Precio Venta</label>
                                <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta"
                                    step="0.01" min="0" placeholder="Precio Venta">
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
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
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
                                            </th>
                                        </tfoot>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success me-1 mb-1" id="guardar">Guardar</button>
                        <a href="{{ route('ingresos.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
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

            let cont = 0;
            let total = 0;
            let subtotal = [];

            $("#guardar").hide();
            $("#pidarticulo").change(mostrarValores);

            function mostrarValores() {
                const datosArticulo = document.getElementById("pidarticulo").value.split("_");
                $("#pcantidad").val(datosArticulo[1]);
                $("#unidad").html(datosArticulo[2]);
            }

            function agregar() {
                const datosArticulo = document.getElementById("pidarticulo").value.split("_");

                const idarticulo = datosArticulo[0];
                const articulo = $("#pidarticulo option:selected").text();
                const cantidad = parseFloat($("#pcantidad").val());
                const precio_compra = parseFloat($("#pprecio_compra").val());
                const precio_venta = parseFloat($("#pprecio_venta").val());

                if (idarticulo && cantidad && cantidad > 0 && precio_compra && precio_venta) {
                    subtotal[cont] = cantidad * precio_compra;
                    total += subtotal[cont];

                    const fila = `<tr class="selected" id="fila${cont}">
                            <td><button type="button" class="btn btn-warning" onclick="eliminar(${cont});">X</button></td>
                            <td><input type="hidden" name="idarticulo[]" value="${idarticulo}">${idarticulo}</td>
                            <td><input type="number" name="cantidad[]" value="${cantidad}"></td>
                            <td><input type="number" name="precio_compra[]" value="${precio_compra}"></td>
                            <td><input type="number" name="precio_venta[]" value="${precio_venta}"></td>
                            <td>${subtotal[cont]}</td>
                          </tr>`;

                    cont++;
                    limpiar();
                    $("#total").html(`$ ${total}`);
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    alert("Error al Ingresar el Detalle de la Compra, Revise los Campos");
                }
            }

            function limpiar() {
                $("#pcantidad").val("");
                $("#pprecio_compra").val("");
                $("#pprecio_venta").val("");
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
                $("#total").html(`$: ${total}`);
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endpush
@endsection
