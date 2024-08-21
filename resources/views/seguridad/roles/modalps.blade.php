<x-adminlte-modal id="modalPurple" title="Nuevos Permisos" theme="primary" icon="fas fa-bolt" size='md'
    disable-animations>
    {{-- Modal para Nuevos Permisos --}}
    <form action="{{ route('permisos.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <x-adminlte-input name="nombre" id="nombre" placeholder="Ingrese el nombre del permiso"
                            fgroup-class="col-md-12" disable-feedback label="Nombre del Permiso"
                            label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>
            </div>
            <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
        </div>
    </form>
</x-adminlte-modal>
