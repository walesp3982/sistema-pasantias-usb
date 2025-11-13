<?php

use App\Models\User;
use App\Models\Information\Career;
use App\Models\Information\Shift;
use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use App\Service\StudentService;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public $first_name = '';
    public $last_name = '';
    public $identity_card = '';
    public $semester = null;
    public $shift_id = null;
    public $career_id = null;

    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Select de carreras
    public $carreras = [];

    // Select de turnos
    public $shifts = [];

    // Select dependiente

    public function mount(StudentService $studentService)
    {
        $this->service = $studentService;

        $this->carreras = Career::orderBy('name')->get();

        $this->shifts = Shift::orderBy('id')->get();

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
    protected $rules = [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'identity_card' => 'required|integer',
        'semester' => 'required|integer|min:1|max:10',
        'shift_id' => 'required|exists:shifts,id',
        'career_id' => 'required|exists:careers,id',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'confirmed'],
        'password_confirmation' => ['required', 'string']
    ];
    public function submit(StudentService $service): void
    {
        $validate = $this->validate();

        $student = $service->create($validate);
        Auth::login($student->user);
        $this->redirect(route('dashboard'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}; ?>

<div>
    @if($errors->any())
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form wire:submit="submit">
        <!-- Name -->
        <x-form.title>
            Registro Estudiante
            <x-slot:subtitle>
                Ingrese los siguientes datos:
            </x-slot:subtitle>
        </x-form.title>
        <x-form.section>Datos personales</x-form.section>
        <div>
            <x-form.label>
                Nombres:
            </x-form.label>
            <x-form.input-text wire:model="first_name" name="first_name" placeholder="Juan Pedro"></x-form.input-text>
        </div>
        <div>
            <x-form.label>
                Apellidos:
            </x-form.label>
            <x-form.input-text wire:model="last_name" name="last_name" placeholder="Quispe Mamani"></x-form.input-text>
        </div>
        <div>
            <x-form.label>
                Numero de carnet:
            </x-form.label>
            <x-form.input-text wire:model="identity_card" name="identity_card"
                placeholder="123456789"></x-form.input-text>
        </div>
        <x-form.section>Datos académicos</x-form.section>
        <div>
            <x-form.select id="career_id" model="career_id">
                <option value="">Seleccione la carrera...</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}"> {{ $carrera->name }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-form.label>
                    Semestre
                </x-form.label>
                <x-form.select id="semester" model="semester">
                    <option value="">Semestre...</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{$i}}° Semestre </option>
                    @endfor
                </x-form.select>
            </div>
            <div>
                <x-form.label>
                    Turno
                </x-form.label>
                <x-form.select id="shift_id" model="shift_id">
                    <option value="">Turno...</option>
                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}"> {{ $shift->name }}</option>
                    @endforeach
                </x-form.select>
            </div>
        </div>

        {{-- <x-form.label>
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
        </div> --}}
        {{-- <div class="grid grid-cols-3 gap-4">
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
        </div> --}}
        {{-- <x-form.section>Credenciales</x-form.section> --}}
        <div>
            <x-form.label>
                Email
            </x-form.label>
            <x-form.input-text wire:model="email" name="email" placeholder="example@gmail.com"></x-form.input-text>
        </div>
        <div>
            <x-form.label>
                Contraseña:
            </x-form.label>
            <x-form.input-text wire:model="password" name="password" placeholder="**********"></x-form.input-text>
        </div>
        <div>
            <x-form.label>
                Confirmar Contraseña:
            </x-form.label>
            <x-form.input-text wire:model="password_confirmation" name="password_confirmation"
                placeholder="**********"></x-form.input-text>
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
</div>
