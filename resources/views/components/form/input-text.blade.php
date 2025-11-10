@props(['placeholder' => null, 'name', 'value' => null])
<input type="text"
    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
    placeholder="{{ $placeholder }}" wire:model="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" required>
