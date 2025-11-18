<?php

use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Service\CompanyService;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new #[Layout('components.layouts.guest')] class extends Component {
    public ?string $name = '';
    public ?string $email = '';
    public ?int $sector_id = null;
    public ?string $street = '';
    public ?int $zone_id = null;
    public ?string $reference = '';
    public ?int $number_door = null;
    public ?string $phone_number = '';
    public ?string $name_manager = '';

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
        'sector_id.required' => "seleccione el sector",
        'street.required' => "Ingrese la calle",
        'zone_id.required' => "ingrese la zona",
        'number_door.required' => "Ingrese el numero de puerta",
        'phone_number.required' => "Ingrese numero de telefono",
        'name_manager.required' => "Ingrese nombre del encargado",   
               
    ];

    public function submit(CompanyService $service): void
    {
        $validate = $this->validate();

        $service->create($validate);
        session()->flash('message', 'Formulario enviado correctamente');
        $this->reset();

        $this->dispatch("reset-child-component");
    }

    #[On('location-updated')]
    public function updateLocation( $data)
    {
        $this->zone_id = $data['zona_id'];
        $this->street = $data['street'];
        $this->number_door = $data['number_door'];
        $this->reference = $data['reference'];
        $this->phone_number = $data['phone_number'];
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

    @if($errors->any())
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <x-ui.msg.warning>{{ $error }}</x-ui.msg.warning>
            @endforeach
        </ul>
    @endif
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

            @error('$sector_id')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        </div>
        <x-form.section>
            Ubicación geográfica
        </x-form.section>
        <livewire:forms.shared.location :zona_id="$zone_id" :number_door="$number_door" :street="$street"
            :reference="$reference">
        </livewire:forms.shared.location>

        @error('$zone_id')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

            @error('$number_door')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

            @error('$street')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                Registrarse
            </x-primary-button>
        </div>
    </form>
</div>
{{-- <div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}