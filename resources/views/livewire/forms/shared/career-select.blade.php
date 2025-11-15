<x-form.select id="career_id" wire:model.live="career_id">
    <option value="">Seleccione la carrera...</option>
    @foreach ($careers as $career)
        <option value="{{ $career->id }}"> {{ $career->name }}</option>
    @endforeach
</x-form.select>
