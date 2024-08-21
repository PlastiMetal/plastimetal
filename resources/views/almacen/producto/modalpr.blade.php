{{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Nuevos Productos" theme="primary" icon="fas fa-bolt" size='lg'
    disable-animations>
    <form action="{{ route('producto.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="nombre" id="nombre"
                            placeholder="Ingresa el Nombre del Producto" fgroup-class="col-md-12" disable-feedback
                            label="Producto" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-select for="categorias" name="categoria_id" id="categoria_id" label="Categoría"
                            label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-tag"></i>
                                </div>
                            </x-slot>
                            @foreach ($categorias as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $cat->id == old('categoria_id') ? 'selected' : '' }}>
                                    {{ $cat->categorias }}
                                </option>
                            @endforeach

                        </x-adminlte-select>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="codigo" id="codigo"
                            placeholder="Ingresa el Código del Producto" fgroup-class="col-md-12" disable-feedback
                            label="Código del Producto" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="stock" id="stock"
                            placeholder="Ingresa el Stock del Producto" fgroup-class="col-md-12" disable-feedback
                            label="Stock del Producto" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="descripcion" id="descripcion"
                            placeholder="Ingresa la Descripción del Producto" fgroup-class="col-md-12" disable-feedback
                            label="Descripción del Producto" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input-file name="imagen" id="imagen" label="Imagen" label-class="text-lightblue"
                            igroup-size="lg" placeholder="buscar imagen" fgroup-class="col-md-12" disable-feedback>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                    </div>
                </div>
                <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
            </div>
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
