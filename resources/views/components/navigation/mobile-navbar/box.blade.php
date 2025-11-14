<div id="mobileMenu"
    x-show="open"
    @click.outside="open = false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="absolute lg:hidden bg-white shadow-lg w-full" style="display:none">
    <ul class="flex flex-col px-6 py-4 space-y-2">
        {{ $slot }}
    </ul>
</div>
