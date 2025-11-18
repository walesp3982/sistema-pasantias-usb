<div>
    <div>
        <div>
            <x-form.label>
                Municipio
            </x-form.label>

            <x-form.select id="municipio_id" wire:model.blur="municipio_id">
                <option value="">Seleccione un municipio...</option>
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div>
            <x-form.label>
                Zona
            </x-form.label>

            @if(!$municipio_id)
                <x-form.select id="zona_id" wire:model.blur="zona_id" disabled>
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @else
                <x-form.select id="zona_id" wire:model.blur="zona_id">
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @endif
        </div>
    </div>
    <div>
        <div>
            <x-form.label>
                Calle
            </x-form.label>
            <x-form.input wire:model.blur="street" placeholder="Av. 16 de Julio"></x-form.input>
        </div>
        <div>
            <x-form.label>
                Número puerta
            </x-form.label>
            <x-form.input wire:model.blur="number_door" placeholder="Ej: 1324" type="number"></x-form.input>
        </div>
    </div>
    <div>
        <x-form.label>
            Referencia (Opcional)
        </x-form.label>
        <x-form.input wire:model.blur="reference" placeholder="Frente al Multicine"></x-form.input>
    </div>
    <div>
        <x-form.label>
            Telefono
        </x-form.label>
        <x-form.input wire:model.blur="phone_number" placeholder="Ej: 63174767"></x-form.input>
    </div>

</div>
