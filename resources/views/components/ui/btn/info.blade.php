<button class="px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition
    flex items-center lg:justify-between justify-center gap-2 focus:bg-blue-400">
    @isset($icon)
        <div>
            {{ $icon }}
        </div>
    @endisset
    <div class="hidden md:block text-right">
        {{ $slot }}
    </div>
</button>