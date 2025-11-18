<?php

use App\Models\Company;
use App\Service\CompanyService;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new #[Layout('components.layouts.app')] class extends Component {


    private Company $company;

    public ?int $career_id;
    protected $rules = [

    ];

    public function submit(CompanyService $service): void
    {
        $validate = $this->validate();

        $service->create($validate);
        session()->flash('message', 'Pasantía registrada correctamente');
        $this->reset();

        $this->dispatch("reset-child-component");
    }

    public function mount(Company $company) {
        $this->company = $company;
    }
}
 ?>

<x-form.container>
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
            Registro de Pasantía
            <x-slot:subtitle>
                Ingrese los datos de la siguiente compañia
            </x-slot:subtitle>
        </x-form.title>

        <x-form.label> Empresa: {{ $this->company->name }}</x-form.label>
        <x-form.section>
            Datos de la Oferta
        </x-form.section>
        <div class="grid grid-cols-3 gap-2">
            <div class="col-span-1">
                <x-form.label>Vacantes</x-form.label>
                <x-form.input input="number" placeholder="2">
                </x-form.input>
            </div>
            <div class="col-span-2">
                <x-form.label>Carrera</x-form.label>
                <livewire:forms.shared.career-select :careerId="$career_id">
                </livewire:forms.shared.career-select>
            </div>
        </div>
        <x-form.section>Configurar fechas</x-form.section>
        <div>
            <x-form.label>Fecha de inicio</x-form.label>
            <x-form.input type="date"></x-form.input>
        </div>
        <div>
            <x-form.label>Fecha final</x-form.label>
            <x-form.input type="date"></x-form.input>
        </div>
        <div>
            <x-form.label>Fecha límite de postulation </x-form.label>
            <x-form.input type="date"></x-form.input>
        </div>

        <x-form.section>
            Configurar horarios
        </x-form.section>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <x-form.label>Hora de entrada</x-form.label>
                <x-form.input type="time"></x-form.input>
            </div>
            <div>
                <x-form.label>Hora de salida</x-form.label>
                <x-form.input type="time"></x-form.input>
            </div>
        </div>

        <div>
            <x-form.label>Ubicación</x-form.label>
        </div>

        <div>
            <x-form.label>Teléfono de contacto</x-form.label>
        </div>

        <div class="flex items-center justify-end">
            <x-ui.btn.primary>
                Registrar Pasantía
            </x-ui.btn.primary>
        </div>

    </form>
</x-form.container>
