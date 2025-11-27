@props(['disabled' => false, 'type' => null])

<button  {{ $disabled ? 'disabled' : '' }}  class="px-4 py-2 w-full bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition
    flex items-center justify-center gap-2
    disabled:bg-gray-400
        disabled:text-gray-200
        disabled:cursor-not-allowed
        disabled:shadow-none
        disabled:hover:bg-gray-400"
        type="{{ $type }}">
    @isset($icon)
        <div>
            {{ $icon }}
        </div>
    @endisset
    <div class=" hidden md:block">
    {{ $slot }}
    </div>
</button>