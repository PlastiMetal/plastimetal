@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">NUEVA CATEGORIA</h3>
            </div>

            <form action="{{ route('categoria.store') }}" method="POST" class="form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="categoria">Nombre</label>
                        <input type="text" class="form-control" name="categorias" id="categorias"
                            placeholder="Ingresa el nombre de la Categoría">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion"
                            placeholder="Ingresa la descripción de la Categoría">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <a href="{{ route('categoria.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
