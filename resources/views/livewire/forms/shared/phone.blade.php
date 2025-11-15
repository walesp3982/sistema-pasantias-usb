<?php



?>

<div>
    <x-form.section>Contacto</x-form.section>
    <x-form.label>
        <u>Teléfono</u>
    </x-form.label>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            <x-form.label>
                Prefijo
            </x-form.label>
            <x-form.input-text name="code_phone" placeholder="591" value="591"></x-form.input-text>
        </div>
        <div class="col-span-2">
            <x-form.label>
                Teléfono
            </x-form.label>
            <x-form.input-text name="phone" placeholder="63174767"></x-form.input-text>
        </div>
    </div>
</div>
