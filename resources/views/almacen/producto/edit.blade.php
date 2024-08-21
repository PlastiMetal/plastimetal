@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">EDITAR PRODUCTO</h3>
            </div>

            <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data"
                class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{ old('nombre', $producto->nombre) }}"
                                    placeholder="Ingresa el nombre del Producto">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categorias">Categoria</label>
                                <select name="categoria_id" id="categoria_id" required class="form-control">
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $cat->id == old('categoria_id', $producto->categoria_id) ? 'selected' : '' }}>
                                            {{ $cat->categorias }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input type="text" class="form-control" name="codigo" id="codigo"
                                    value="{{ $producto->codigo }}" placeholder="Ingresa el Código del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $producto->stock }}" placeholder="Ingresa el Stock del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    value="{{ $producto->descripcion }}" placeholder="Ingresa la Descripción del Producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Imágen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                                @if ($producto->imagen != '')
                                    <img src="{{ asset('imagenes/productos/' . $producto->imagen) }}" width="100px"
                                        height="100px">
                                @endif
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
