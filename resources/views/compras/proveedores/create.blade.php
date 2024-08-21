@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">NUEVO PROVEEDOR</h3>
            </div>

            <form action="{{ route('proveedores.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tipo_persona">Tipo Persona</label>
                                <select name="tipo_persona" class="form-control" id="tipo_persona">
                                    <option value="cliente">Cliente</option>
                                    <option value="proveedor">Proveedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    placeholder="Ingresa el Nombre de la Persona">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tipo_documento">Tipo Documento</label>
                                <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="DUI">DUI</option>
                                    <option value="NRC">NRC</option>
                                    <option value="NIT">NIT</option>
                                    <option value="CARNET MINORIDAD">CARNET MINORIDAD</option>
                                    <option value="CARNET EXTRANJERO">CARNET EXTRANJERO</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="num_documento">Número de Documento</label>
                                <input type="text" class="form-control" name="num_documento" id="num_documento"
                                    placeholder="Ingresa el Número de Documento">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="telefono">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Ingresa el Número de Teléfono">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Correo Electónico</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Ingresa el Email de la Persona">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="direccion">Dirección de la Persona</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    placeholder="Ingresa la Dirección de la Persona">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <a href="{{ route('proveedores.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
