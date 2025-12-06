<?php

use App\Models\Company;
use App\Service\CompanyService;
use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new #[Layout('components.layouts.guest')] class extends Component {
    public ?string $name = '';
    public ?string $email = '';
    public ?int $sector_id = null;
    public ?string $name_manager = '';

    public ?int $municipio_id = null;
    public ?int $zone_id = null;
    public ?string $street = '';
    public ?int $number_door = null;
    public ?string $reference = '';
    public ?string $phone_number = '';

    public $municipios = [];
    public $zonas = [];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:' . Company::class],
        'sector_id' => ['required', 'integer', 'exists:sectors,id'],
        'street' => ['required', 'string', 'max:50'],
        'zone_id' => ['required', 'integer', 'exists:zones,id'],
        'reference' => ['string', 'max:50'],
        'number_door' => ['required', 'integer', 'max:999999'],
        'phone_number' => ['required', 'string', 'max:10'],
        'name_manager' => ['required', 'string', 'max:50'],
    ];
    protected $messages = [
        'name.required' => "Ingrese nombre de la empresa",
        'email.required' => "Ingrese correo electronico de la empresa",
        'sector_id.required' => "Seleccione el sector",
        'street.required' => "Ingrese la calle",
        'zone_id.required' => "ingrese la zona",
        'number_door.required' => "Ingrese el numero de puerta",
        'phone_number.required' => "Ingrese numero de telefono",
        'name_manager.required' => "Ingrese nombre del encargado",

    ];

    public function mount()
    {
        $this->municipios = Municipality::orderBy("name")->get();
        $this->zonas = collect();
    }

    public function updatedMunicipioId($id)
    {
        $this->zone_id = null;
        $this->zonas = $id ?
            Zone::where('municipality_id', $id)->orderBy('name')->get()
            : collect();
    }

    public function submit(CompanyService $service): void
    {
        $validate = $this->validate();

        $service->create($validate);
        session()->flash('message', 'Formulario enviado correctamente');
        $this->reset();

        $this->dispatch("reset-child-component");
    }

    #[On('sectorSelected')]
    public function updateSector(int $sectorId)
    {
        $this->sector_id = $sectorId;
    }
}
 ?>

<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- @if($errors->any())
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <x-ui.msg.warning>{{ $error }}</x-ui.msg.warning>
        @endforeach
    </ul>
    @endif --}}
    <form wire:submit="submit">
        <x-form.title>
            Registro Compañia
            <x-slot:subtitle>
                Ingrese los siguientes datos:
            </x-slot:subtitle>
        </x-form.title>

        <x-form.section>
            Datos empresariales
        </x-form.section>
        <div>
            <x-form.label>
                Nombre de la empresa
            </x-form.label>
            <x-form.input wire:model="name" placeholder="Toyota S.R.L">
            </x-form.input>

            @error('name')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <div>
            <x-form.label>
                Nombre del encargado
            </x-form.label>
            <x-form.input wire:model="name_manager" placeholder="Juan Quispe Gomez">
            </x-form.input>

            @error('name_manager')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <div>
            <x-form.label>
                Correo electrónico
            </x-form.label>
            <x-form.input wire:model="email" placeholder="correo@ejemplo.com">
            </x-form.input>

            @error('email')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <div>
            <x-form.label>
                Sector
            </x-form.label>
            <livewire:forms.shared.sector-select :sector_id="$sector_id">
            </livewire:forms.shared.sector-select>

            @error('sector_id')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <x-form.section>
            Ubicación geográfica
        </x-form.section>
        <div>
            <x-form.label>
                Municipio
            </x-form.label>

            <x-form.select id="municipio_id" wire:model.lazy="municipio_id">
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
                <x-form.select id="zone_id" wire:model="zone_id" disabled>
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @else
                <x-form.select id="zone_id" wire:model="zone_id">
                    <option value="">Seleccione una zona...</option>
                    @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach
                </x-form.select>
            @endif

            @error('zone_id')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <div>
            <x-form.label>
                Calle
            </x-form.label>
            <x-form.input wire:model="street" placeholder="Av. 16 de Julio"></x-form.input>
            @error('street')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <div>
            <x-form.label>
                Número puerta
            </x-form.label>
            <x-form.input wire:model="number_door" placeholder="Ej: 1324" type="number"></x-form.input>
            @error('number_door')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <div>
            <x-form.label>
                Referencia (Opcional)
            </x-form.label>
            <x-form.input wire:model="reference" placeholder="Frente al Multicine"></x-form.input>
            @error('reference')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <div>
            <x-form.label>
                Telefono
            </x-form.label>
            <x-form.input wire:model="phone_number" placeholder="Ej: 63174767"></x-form.input>
            @error('phone_number')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                Registrarse
            </x-primary-button>
        </div>
    </form>
</div>
