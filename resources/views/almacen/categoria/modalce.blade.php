{{-- Themed --}}
<x-adminlte-modal id="modal-update-{{ $cat->id }}" title="Editar Proveedores" theme="primary" icon="fas fa-bolt"
    disable-animations>
    <form action="{{ route('categoria.update', $cat->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <x-adminlte-input label="Nombre" label-class="text-lightblue" name="categorias" id="categorias"
                    value="{{ $cat->categorias }}" placeholder="Ingresa el nombre de la Categoría"
                    fgroup-class="col-md-12" disable-feedback />
            </div>
            <div class="form-group">
                <x-adminlte-input label="Nombre" label-class="text-lightblue" name="descripcion" id="descripcion"
                    value="{{ $cat->descripcion }}" placeholder="Ingresa la Descripción de la Categoría"
                    fgroup-class="col-md-12" disable-feedback />
            </div>
            <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
