<x-form.select id="careerId" wire:model.blur="career_id">
    <option value="">Seleccione la carrera...</option>
    @foreach ($careers as $career)
        <option value="{{ $career->id }}"> {{ $career->name }}</option>
    @endforeach
</x-form.select>
