<?php

use App\Models\Information\Shift;
use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Illuminate\Support\Facades\Auth;
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
    public $ru = '';

    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';


    protected $listeners = ['career-selected' => 'handleCarrerSelected'];
    // Select de turnos
    public $shifts = [];

    // Select dependiente

    public function mount(StudentService $studentService)
    {
        $this->service = $studentService;

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

    public function handleCareerSelected($careerId) {
        $this->career_id = $careerId;
    }

    protected $rules = [
        'first_name' => ['required', 'string', 'max:50'],
        'last_name' => ['required', 'string', 'max:50'],
        'identity_card' => 'required|integer',
        'ru' => 'required|unique:students',
        'semester' => 'required|integer|min:1|max:10',
        'shift_id' => 'required|exists:shifts,id',
        'career_id' => 'required|exists:careers,id',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:users'],
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
                <x-ui.msg.warning>{{ $error }}</x-ui.msg.warning>
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
            <x-form.input wire:model="first_name" placeholder="Juan Pedro" type="text"></x-form.input>
        </div>
        <div>
            <x-form.label>
                Apellidos:
            </x-form.label>
            <x-form.input wire:model="last_name" placeholder="Quispe Mamani" type="text"></x-form.input>
        </div>
        <div>
            <x-form.label>
                Numero de carnet:
            </x-form.label>
            <x-form.input wire:model="identity_card"
                placeholder="123456789" type="number"></x-form.input>
        </div>
        <x-form.section>Datos académicos</x-form.section>
        <div>
            <x-form.label>Registro Universitario:</x-form.label>
            <x-form.input wire:model="ru"
            placeholder="ej: 63872" type="number"></x-form.input>
        </div>
        <div>
            {{-- <x-form.select id="career_id" model="career_id">
                <option value="">Seleccione la carrera...</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}"> {{ $carrera->name }}</option>
                @endforeach
            </x-form.select> --}}
            <livewire:pages.forms.partials.career-select
                wire:model="career_id">

            </livewire:pages.forms.partials.career-select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-form.label>
                    Semestre
                </x-form.label>
                <x-form.select id="semester" wire:model="semester">
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
                <x-form.select id="shift_id" wire:model="shift_id">
                    <option value="">Turno...</option>
                    @foreach ($shifts as $shift)
                        <option value="{{ $shift->id }}"> {{ $shift->name }}</option>
                    @endforeach
                </x-form.select>
            </div>
        </div>
        <div>
            <x-form.label>
                Email
            </x-form.label>
            <x-form.input wire:model="email" type="email" placeholder="example@gmail.com"></x-form>
        </div>
        <div>
            <x-form.label>
                Contraseña:
            </x-form.label>
            <x-form.input wire:model="password" type="password"></x-form>
        </div>
        <div>
            <x-form.label>
                Confirmar Contraseña:
            </x-form.label>
            <x-form.input wire:model="password_confirmation" type="password"></x-form>
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
