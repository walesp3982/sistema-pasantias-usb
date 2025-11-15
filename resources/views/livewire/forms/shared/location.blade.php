<?php

use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Livewire\Attributes\Layout;
use App\Service\StudentService;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    // Select dependiente
    public $municipios = [];
    public $zonas = [];

    public $municipio_id = null;
    public $zona_id = null;

    public function mount(StudentService $studentService)
    {
        $this->municipios = Municipality::orderBy('name')->get();

        $this->zonas = collect();
    }

    public function updatedMunicipioId($id)
    {
        $this->zona_id = null;
        $this->zonas = $id ?
            Zone::where('municipality_id', $id)->orderBy('name')->get()
            : collect();
    }
    /**
     * Handle an incoming registration request.
     */
}; ?>

<div>
    <form action="">
        <x-form.label>
            <u>Ubicación</u>
        </x-form.label>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <x-form.label>
                    Municipio
                </x-form.label>

                <select id="municipio_id" wire:model.live="municipio_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300">
                    <option value="">Seleccione un municipio...</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <x-form.label>
                    Zona
                </x-form.label>

                <select id="zona_id" wire:model="zona_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300"
                    {{ !$municipio_id ? 'disabled' : '' }}>
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <x-form.label>
            <u>Ubicación</u>
        </x-form.label>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <x-form.label>
                    Municipio
                </x-form.label>

                <select id="municipio_id" wire:model.live="municipio_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300">
                    <option value="">Seleccione un municipio...</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <x-form.label>
                    Zona
                </x-form.label>

                <select id="zona_id" wire:model="zona_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300"
                    {{ !$municipio_id ? 'disabled' : '' }}>
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <x-form.label>
                    Calle
                </x-form.label>
                <x-form.input-text name="street" placeholder="Av. 16 de Julio"></x-form.input-text>
            </div>
            <div class="col-span-2">
                <x-form.label>
                    Número puerta
                </x-form.label>
                <x-form.input-text name="number_door" placeholder="132"></x-form.input-text>
            </div>
        </div>
    </form>
</div>
