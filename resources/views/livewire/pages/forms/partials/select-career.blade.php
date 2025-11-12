<?php

use App\Models\Information\Career;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {
    public $career_id = null;

    public $careers = [];

    public function mount()
    {
        $this->careers = Career::orderBy('name')->get();
    }

    public function updatedCareerID($value) {
        $this->dispatch('career-selected', $value);
    }
}
?>
<x-form.select id="career_id" wire:model="career_id">
    <option value="">Seleccione la carrera...</option>
    @foreach ($careers as $career)
        <option value="{{ $career->id }}"> {{ $career->name }}</option>
    @endforeach
</x-form.select>
