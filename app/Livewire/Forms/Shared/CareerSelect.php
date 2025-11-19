<?php

namespace App\Livewire\Forms\Shared;

use App\Models\Information\Career;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;

class CareerSelect extends Component
{
    #[Modelable]
    public $career_id;


    #[On("reset-child-component")]
    public function resetAll() {
        $this->reset(['career_id']);
    }
    public function render()
    {
        return view(
            'livewire.forms.shared.career-select',
            ['careers' => Career::orderBy("name")->get()]
        );
    }
}
