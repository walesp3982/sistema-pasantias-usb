<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            <x-form.label>
                Municipio
            </x-form.label>

            <x-form.select id="municipio_id" wire:model.live="municipio_id">
                <option value="">Seleccione un municipio...</option>
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-span-2">
            <x-form.label>
                Zona
            </x-form.label>

            @if(!$municipio_id)
                <x-form.select id="zona_id" wire:model.live="zona_id" disabled>
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @else
                <x-form.select id="zona_id" wire:model.live="zona_id">
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            <x-form.label>
                Calle
            </x-form.label>
            <x-form.input wire:model.live="street" placeholder="Av. 16 de Julio"></x-form.input>
        </div>
        <div class="col-span-2">
            <x-form.label>
                Número puerta
            </x-form.label>
            <x-form.input wire:model.live="number_door" placeholder="132" type="number"></x-form.input>
        </div>
    </div>
    <div>
        <x-form.label>
            Referencia(Opcional)
        </x-form.label>
        <x-form.input wire:model.live="reference" placeholder="Frente al Multicine"></x-form.input>
    </div>

</div>
