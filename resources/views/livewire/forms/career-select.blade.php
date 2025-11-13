<div>
    <x-form.label>Carrera:</x-form.label>
    <x-form.select id="career_id" wire:model.live="careerId">
        <option value="">Seleccione la carrera...</option>
        @foreach ($careers as $career)
            <option value="{{ $career->id }}">{{ $career->name }}</option>
        @endforeach
    </x-form.select>
</div>
