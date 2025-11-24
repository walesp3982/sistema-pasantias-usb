<?php

use App\Models\Company;
use App\Service\InternshipService;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Http\Requests\StoreInternshipRequest;
use Illuminate\Validation\Rule;
new #[Layout('components.layouts.app')] class extends Component {

    public int $company_id;
    public ?int $career_id;
    public ?string $start_date;
    public ?string $end_date;
    public ?string $postulation_limit_date;
    public ?string $entry_time;
    public ?string $exit_time;
    public ?int $location_id;
    public ?int $phone_id;
    public ?int $vacant;

    protected $messages = [
        'postulation_limit_date.after' => 'La fecha límite de postulación tiene que ser superior o igual a 7 días.',
        'postulation_limit_date.required' => 'La fecha límite es obligatoria.',
    ];

    public function getRules()
    {
        return (new StoreInternshipRequest())->rules();
    }

    public function getCompanyProperty()
    {
        return Company::findOrFail($this->company_id);
    }

    public function submit(InternshipService $service): void
    {
        $validate = $this->validate($this->getRules());

        $service->create($validate);
        session()->flash('message', 'Pasantía registrada correctamente');

        $this->reset([
            'career_id',
            'start_date',
            'end_date',
            'postulation_limit_date',
            'entry_time',
            'exit_time',
            'location_id',
            'vacant'
        ]);

        $this->dispatch("reset-child-component");

        // $this->redirect(route('agreements.company'));
    }

    public function mount(int $company_id)
    {
        // $this->company = Company::findOrFail($company_id);
        $this->company_id = $company_id;
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
                <x-form.input type="number" placeholder="2" wire:model="vacant">
                </x-form.input>
            </div>
            <div class="col-span-2">
                <x-form.label>Carrera</x-form.label>
                <livewire:forms.shared.career-select wire:model="career_id" />

            </div>
        </div>
        <x-form.section>Configurar fechas</x-form.section>
        <div>
            <x-form.label>Fecha límite de postulation </x-form.label>
            <x-form.input type="date" wire:model="postulation_limit_date"></x-form.input>
        </div>
        <div>
            <x-form.label>Fecha de inicio</x-form.label>
            <x-form.input type="date" wire:model="start_date"></x-form.input>
        </div>
        <div>
            <x-form.label>Fecha final</x-form.label>
            <x-form.input type="date" wire:model="end_date"></x-form.input>
        </div>


        <x-form.section>
            Configurar horarios
        </x-form.section>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <x-form.label>Hora de entrada</x-form.label>
                <x-form.input type="time" wire:model="entry_time"></x-form.input>
            </div>
            <div>
                <x-form.label>Hora de salida</x-form.label>
                <x-form.input type="time" wire:model="exit_time"></x-form.input>
            </div>
        </div>

        <div>
            <x-form.label>Ubicación</x-form.label>
            <x-form.select wire:model="location_id">
                <option value="">Seleccione una ubicación</option>
                @foreach ($this->company->locations as $location)
                    <option value="{{ $location->id }}">{{ $location->full_address }}</option>
                @endforeach
            </x-form.select>
        </div>

        <div class="mt-3 flex items-center justify-end">
            <x-ui.btn.primary>
                Registrar Pasantía
            </x-ui.btn.primary>

        </div>

    </form>
</x-form.container>
