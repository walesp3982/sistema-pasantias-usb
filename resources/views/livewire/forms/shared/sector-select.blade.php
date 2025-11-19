<x-form.select id="sector_id" wire:model.live="sector_id">
    <option value="">Seleccione su sector...</option>
    @foreach ($sectors as $sector)
        <option value="{{ $sector->id }}"> {{ $sector->name }}</option>
    @endforeach
</x-form.select>
