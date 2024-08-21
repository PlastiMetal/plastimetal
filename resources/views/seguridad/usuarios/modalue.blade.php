{{-- Themed --}}
<x-adminlte-modal id="modal-update-{{ $user->id }}" title="Editar Usuarios" theme="primary" icon="fas fa-bolt"
    disable-animations>
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="nombre" id="nombre" value="{{ $user->name }}"
                        placeholder="Ingresa el Nombre del Usuario" fgroup-class="col-md-24" disable-feedback
                        label="Usuario" label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>

            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="email" id="email" type="email"
                        value="{{ $user->email }}" placeholder="Ingresa el Email del Usuario" fgroup-class="col-md-24"
                        disable-feedback label="Email" label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>

            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="password" id="password" type="password"
                        value="{{ $user->password }}" placeholder="Ingresa el Password" fgroup-class="col-md-24"
                        disable-feedback label="Password" label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>
            <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
