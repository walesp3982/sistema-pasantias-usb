<?php

namespace App\Livewire\Forms\Shared;

use App\Models\Information\Career;
use Livewire\Component;

class CareerSelect extends Component
{
    public $career_id = null;
    public $careers;

    public function mount($careerId = null) {
        $this->career_id = $careerId;
        $this->careers = Career::orderBy('name')->get();
    }
    public function updatedCareerId($value) {
        $this->dispatch('careerSelected', careerId: $value  );
    }

    public function render()
    {
        return view('livewire.forms.shared.career-select');
    }
}
