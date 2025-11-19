<?php

use App\Models\Information\Shift;
use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use App\Service\StudentService;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new #[Layout('components.layouts.guest')] class extends Component {
    public $first_name = '';
    public $last_name = '';
    public $semester = null;
    public $shift_id = null;
    public $career_id;
    public $ru = '';

    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Select de turnos
    public $shifts = [];

    // Select dependiente

    public function mount(StudentService $studentService)
    {
        $this->service = $studentService;

        $this->shifts = Shift::orderBy('id')->get();
    }

    /**
     * Handle an incoming registration request.
     */

    protected $rules = [
        'first_name' => ['required', 'string', 'max:50'],
        'last_name' => ['required', 'string', 'max:50'],
        'ru' => 'required|unique:students',
        'semester' => 'required|integer|min:1|max:10',
        'shift_id' => 'required|exists:shifts,id',
        'career_id' => 'required|exists:careers,id',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:users'],
        'password' => ['required', 'string', 'confirmed'],
        'password_confirmation' => ['required', 'string']
    ];

    protected $messages = [
        'first_name.required' => "Ingrese su nombre",
        'last_name.required' => "Ingrese su apellido",
        'ru.required' => "Ingrese su ru (codigo universitario)",
        'semester.required' => "Ingrese su semestre",
        'shift_id.required' => "Ingrese su turno",
        'career.required' => "Ingrese su carrera",
        'email.required' => "Ingrese su correo electronico",
        'password.required' => "Ingrese su contraseña",
        'password_confirmation.required' => "Ingrese confirmacion de contraseña",

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
            @error('first_name')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <div>
            <x-form.label>
                Apellidos:
            </x-form.label>
            <x-form.input wire:model="last_name" placeholder="Quispe Mamani" type="text"></x-form.input>
            @error('last_name')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <x-form.section>Datos académicos</x-form.section>
        <div>
            <x-form.label>Registro Universitario:</x-form.label>
            <x-form.input wire:model="ru" placeholder="ej: 63872" type="number"></x-form.input>
            @error('ru')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
        </div>
        <div>
            <x-form.label>
                Carrera:
            </x-form.label>
            <livewire:forms.shared.career-select wire:model="career_id" />
            @error('career_id')
                <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
            @enderror
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
                @error('semester')
                    <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
                @enderror
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
                @error('shift_id')
                    <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
                @enderror
            </div>
        </div>
        <div>
            <x-form.label>
                Email
            </x-form.label>
            <x-form.input wire:model="email" type="email" placeholder="example@gmail.com"></x-form>
                @error('email')
                    <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
                @enderror
        </div>
        <div>
            <x-form.label>
                Contraseña:
            </x-form.label>
            <x-form.input wire:model="password" type="password"></x-form>
                @error('password')
                    <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
                @enderror
        </div>
        <div>
            <x-form.label>
                Confirmar Contraseña:
            </x-form.label>
            <x-form.input wire:model="password_confirmation" type="password"></x-form>
                @error('password_confirmation')
                    <x-ui.msg.warning>{{ $message }}</x-ui.msg.warning>
                @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}" wire:navigate>
                ¿Ya se encuentra registrado?
            </a>

            <x-ui.btn.primary class="ms-4">
                Registrarse
            </x-ui.btn.primary>
        </div>
    </form>
</div>