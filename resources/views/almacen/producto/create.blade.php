@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">NUEVO PRODUCTO</h3>
            </div>

            <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Producto</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    placeholder="Ingresa el nombre del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categorias">Categoria</label>
                                <select name="categoria_id" id="categoria_id" required class="form-control">

                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->categorias }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input type="text" class="form-control" name="codigo" id="codigo"
                                    placeholder="Ingresa el Código del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    placeholder="Ingresa el Stock del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Ingresa la Descripción del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="imagen">Imágen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <a href="{{ route('producto.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
