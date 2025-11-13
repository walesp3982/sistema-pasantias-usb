<?php

namespace App\Livewire\Shared;

use App\Models\Information\Career;
use Livewire\Component;

class CarrerSelect extends Component
{
    public $careerId = null;
    public $careers;

    public function mount() {
        $this->careers = Career::orderBy('name')->get();
    }
    public function updatedCareerId() {
        $this->dispatch('careerSelected'  );
    }

    public function render()
    {
        return view('livewire.shared.carrer-select');
    }
}
