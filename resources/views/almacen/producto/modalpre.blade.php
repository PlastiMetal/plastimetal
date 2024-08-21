{{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Nuevos Proveedores" theme="primary" icon="fas fa-bolt" size='lg'
    disable-animations>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="nombre" id="nombre"
                            placeholder="Ingresa el Nombre de la Persona" fgroup-class="col-md-12" disable-feedback
                            label="Nombre" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="nombre" id="nombre"
                            placeholder="Ingresa el Nombre de la Persona" fgroup-class="col-md-12" disable-feedback
                            label="Nombre" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-select name="tipo_documento" id="tipo_documento" label="Documento"
                            label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-id-card"></i>
                                </div>
                            </x-slot>
                            <option value="DUI">DUI</option>
                            <option value="NRC">NRC</option>
                            <option value="NIT">NIT</option>
                            <option value="CARNET MINORIDAD">CARNET MINORIDAD</option>
                            <option value="CARNET EXTRANJERO">CARNET EXTRANJERO</option>
                            <option value="OTRO">OTRO</option>
                        </x-adminlte-select>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="num_documento" id="num_documento"
                            placeholder="Ingresa el Número de Documento" fgroup-class="col-md-12" disable-feedback
                            label="Número de Documento" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="telefono" id="telefono"
                            placeholder="Ingresa el Número de Teléfono" fgroup-class="col-md-12" disable-feedback
                            label="Número de Teléfono" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input type="email" class="form-control" name="email" id="email"
                            placeholder="Ingresa el Email de la Persona" fgroup-class="col-md-12" disable-feedback
                            label="Email" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="direccion" id="direccion"
                            placeholder="Ingresa la Dirección de la Persona" fgroup-class="col-md-12" disable-feedback
                            label="Dirección" label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>
                <x-adminlte-button label="Guardar" type="submit" theme="primary" icon="fas fa-save" />
            </div>
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
