<?php

namespace App\Livewire\Forms\Shared;

use App\Models\Sector;
use Livewire\Component;
use Livewire\Attributes\On;
class SectorSelect extends Component
{
    public $sector_id = null;
    public $sectors;

    public function mount($sector_id = null) {
        $this->sectors = Sector::orderBy("name")->get();
        $this->sector_id = $sector_id;
    }

    public function updated() {
        return $this->dispatch('sectorSelected', sectorId: $this->sector_id);
    }

    #[On('reset-child-component')]
    public function resetAll() {
        $this->reset(['sector_id']);
    }
    public function render()
    {
        return view('livewire.forms.shared.sector-select');
    }
}
