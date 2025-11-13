@props(['icon', 'href'])
<li>
    <a href="{{ $href }}"
        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
        <i {{ $attributes->merge(['class' => $icon.' mr-2.5 text-blue-600']) }}></i>
        {{ $slot }}
    </a>
    {{-- "fa-solid fa-house --}}
</li>
