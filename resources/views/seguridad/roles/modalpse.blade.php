<x-adminlte-modal id="modal-update-{{ $permi->id }}" title="Editar Permisos" theme="primary" icon="fas fa-bolt"
    size='md' disable-animations>
    {{-- Modal para Nuevos Roles --}}
    <form action="{{ route('permisos.update', $permi->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <x-adminlte-input name="nombre" id="nombre" placeholder="Ingrese el nombre del Permiso"
                            value="{{ $permi->name }}" fgroup-class="col-md-12" disable-feedback
                            label="Nombre del Permiso" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>
            </div>
            <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
        </div>
    </form>
</x-adminlte-modal>
