<?php

namespace App\Livewire\Forms\Shared;

use App\Models\Geography\Municipality;
use App\Models\Geography\Zone;
use Livewire\Component;
use Livewire\Attributes\On;

class Location extends Component
{
    public $municipio_id = null;
    public $zona_id = null;
    public $street = null;
    public $number_door = null;

    public $reference = null;

    public $phone_number = null;

    public $municipios = [];
    public $zonas = [];

    public function mount() {
        $this->municipios = Municipality::orderBy("name")->get();
        $this->zonas = collect();
    }

    public function updatedMunicipioId($id) {
        $this->zona_id = null;
        $this->zonas = $id?
            Zone::where('municipality_id', $id)->orderBy('name')->get()
            : collect();
    }

     public function updated($property)
    {
        $this->dispatch('location-updated', [
            'zona_id' => $this->zona_id,
            'street' => $this->street,
            'number_door' => $this->number_door,
            'reference' => $this->reference,
            'phone_number' => $this->phone_number
        ]);
    }

    #[On('reset-child-component')]
    public function resetAll() {
        $this->reset([
            'municipio_id',
            'zona_id',
            'street',
            'number_door',
            'reference',
            'phone_number'
        ]);
    }
    public function render()
    {
        return view('livewire.forms.shared.location');
    }
}
