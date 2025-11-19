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


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:' . Company::class],
        'sector_id' => ['required', 'integer', 'exists:sectors,id'],
        'street' => ['required', 'string', 'max:50'],
        'zone_id' => ['required', 'integer', 'exists:zones,id'],
        'reference' => ['string', 'max:50'],
        'number_door' => ['required', 'integer', 'max:999999'],
        'phone_number' => ['required', 'string', 'max:10'],
        'name_administrador' => ['required', 'string', 'max:50'],
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
    public function updateLocation($data)
    {
        $this->zone_id = $data['zona_id'];
        $this->street = $data['street'];
        $this->number_door = $data['number_door'];
        $this->reference = $data['reference'];
    }

    #[On('sectorSelected')]
    public function updateSector(int $sectorId)
    {
        $this->sector_id = $sectorId;
    }
}
 ?>

<div>
    <form method="POST">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-500 mb-2">Informe</h1>
            <p class="text-gray-500">Ingrese los siguientes datos:</p>
        </div>

        <!--Datos del informe-->
        <h2 class="text-xl font-medium text-blue-600 mb-4 pb-2 border-b-2 border-blue-500"> Datos del informe
        </h2>

        <div class="space-y-4">
            <div>
                <label class="block text-blue-600 font-medium mb-1">Nombre del informe</label>
                <input class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none
                focus:ring-2 focus:ring-blue-400" wire:model="informe_id" type="text" required>
            </div>

            <div>
                <label class="block text-blue-600 font-medium mb-1">Descripcion del informe</label>
                <input class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none
                focus:ring-2 focus:ring-blue-400" wire:model="descripcion" type="text" required>
            </div>

            <div>
                <label class="block text-blue-600 font-medium mb-1">Tipo de informe</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300"
                    wire:model="tipo_informe">
                    <option value="">Seleccione el tipo de informe</option>
                    <option value="1">Lorem</option>
                    <option value="2">Lorem</option>
                    <option value="3">Lorem</option>
                </select>
            </div>
            <div>
                <label class="block text-blue-600 font-medium mb-1">Estudiante:</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-300"
                    wire:model="informe_estudiante_id">
                    <option value="">Nombre del estudiante</option>
                    <option value="1">Lorem</option>
                    <option value="2">Lorem</option>
                    <option value="3">Lorem</option>
                </select>
            </div>

            {{-- <div>
                <label class="block text-blue-600 font-medium mb-1">Nombre del documento</label>
                <input class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none
                focus:ring-2 focus:ring-blue-400" wire:model="documento_id" type="text" required>
            </div>
            <div class="flex items-center gap-3">
                <label
                    class="px-4 py-2 bg-gray-800 text-white rounded-md text-xs font-semibold uppercase hover:bg-gray-700">
                    <input type="file" class="hidden" id="documento">
                    <span>Subir documento</span>
                </label>

            </div> --}}


        </div>

        <!-- Botón -->
        <div class="flex justify-end mt-6">
            <button type="submit"
                class="px-4 py-2 bg-gray-800 text-white rounded-md text-xs font-semibold uppercase hover:bg-gray-700">
                Subir informe
            </button>
        </div>

    </form>
</div>
