@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">EDITAR USUARIO {{ $usuarios->name }}</h3>
            </div>

            <form action="{{ route('usuarios.update', $usuarios->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Usuario</label>
                        <input type="text" class="form-control" value="{{ $usuarios->name }}" name="nombre"
                            id="nombre" placeholder="Ingresa el nombre del Usuario">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{ $usuarios->email }}" name="email"
                            id="email" placeholder="Ingresa el email del Usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Ingresa el Password del Usuario">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
