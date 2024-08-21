{{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Nuevos Usuarios" theme="primary" icon="fas fa-bolt" size='md'
    disable-animations>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="nombre" id="nombre"
                        placeholder="Ingresa el Nombre del Usuario" fgroup-class="col-md-24" disable-feedback
                        label="Usuario" label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>

            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="email" id="email" type="email"
                        placeholder="Ingresa el Email del Usuario" fgroup-class="col-md-24" disable-feedback
                        label="Email" label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>

            <div class="col-md-12 col-24">
                <div class="form-group">
                    <x-adminlte-input class="form-control" name="password" id="password" type="password"
                        placeholder="Ingresa el Password" fgroup-class="col-md-24" disable-feedback label="Password"
                        label-class="text-lightblue" igroup-size="lg" />
                </div>
            </div>
            <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
