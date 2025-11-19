@props(['type' => 'text'])
<input {{ $attributes->merge(
    ["class" => "w-full border border-gray-300 rounded px-4 py-2
    focus:outline-none focus:ring-2 focus:ring-blue-400
    focus:border-transparent transition"]
    ) }}
    type="{{ $type }}"
    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
