<button class="px-4 py-2 w-full bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition
    flex items-center justify-between gap-2">
    @isset($icon)
        <div>
            {{ $icon }}
        </div>
    @endisset
    <div class="hidden md:block">
        {{ $slot }}
    </div>
</button>