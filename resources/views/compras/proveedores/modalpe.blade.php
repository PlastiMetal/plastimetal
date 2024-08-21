{{-- Themed --}}
<x-adminlte-modal id="modal-update-{{ $prov->id }}" title="Editar Proveedores" theme="primary" icon="fas fa-bolt"
    size='lg' disable-animations>
    <form action="{{ route('proveedores.update', $prov->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-select name="tipo_persona" class="form-control" id="tipo_persona"
                            label="Tipo Persona" label-class="text-lightblue" igroup-size="lg">
                            <option value="cliente" {{ $prov->tipo_persona == 'cliente' ? 'selected' : '' }}>
                                Cliente</option>
                            <option value="proveedor" {{ $prov->tipo_persona == 'proveedor' ? 'selected' : '' }}>
                                Proveedor</option>
                        </x-adminlte-select>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="nombre" id="nombre" value="{{ $prov->nombre }}"
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
                            <option value="DUI" {{ $prov->tipo_documento == 'DUI' ? 'selected' : '' }}>DUI
                            </option>
                            <option value="NRC" {{ $prov->tipo_documento == 'NRC' ? 'selected' : '' }}>NRC
                            </option>
                            <option value="NIT" {{ $prov->tipo_documento == 'NIT' ? 'selected' : '' }}>NIT
                            </option>
                            <option value="CARNET MINORIDAD"
                                {{ $prov->tipo_documento == 'CARNET MINORIDAD' ? 'selected' : '' }}>CARNET
                                MINORIDAD</option>
                            <option value="CARNET EXTRANJERO"
                                {{ $prov->tipo_documento == 'CARNET EXTRANJERO' ? 'selected' : '' }}>CARNET
                                EXTRANJERO</option>
                            <option value="OTRO" {{ $prov->tipo_documento == 'OTRO' ? 'selected' : '' }}>OTRO
                            </option>
                        </x-adminlte-select>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="num_documento" id="num_documento"
                            value="{{ $prov->num_documento }}" placeholder="Ingresa el Número de Documento"
                            fgroup-class="col-md-12" disable-feedback label="Número de Documento"
                            label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="telefono" id="telefono"
                            value="{{ $prov->telefono }}" placeholder="Ingresa el Número de Teléfono"
                            fgroup-class="col-md-12" disable-feedback label="Número de Teléfono"
                            label-class="text-lightblue" igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-adminlte-input type="email" class="form-control" name="email" id="email"
                            value="{{ $prov->email }}" placeholder="Ingresa el Email de la Persona"
                            fgroup-class="col-md-12" disable-feedback label="Email" label-class="text-lightblue"
                            igroup-size="lg" />
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <x-adminlte-input class="form-control" name="direccion" id="direccion"
                            value="{{ $prov->direccion }}" placeholder="Ingresa la Dirección de la Persona"
                            fgroup-class="col-md-12" disable-feedback label="Dirección" label-class="text-lightblue"
                            igroup-size="lg" />
                    </div>
                </div>

                <x-adminlte-button label="Actualizar" type="submit" theme="primary" icon="fas fa-save" />
            </div>
        </div>
    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
