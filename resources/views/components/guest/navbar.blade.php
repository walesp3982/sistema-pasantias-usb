<header class="py-4 sticky top-0 left-0 w-full bg-white  z-10 shadow-md">
    <nav x-data="open: false" class="w-full"></nav>
    <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">

        <!-- Logo -->
        <x-guest.menu-logo-usb>
        </x-guest.menu-logo-usb>

        <!-- Menú -->
        <x-landing.ui.menu-options>
            <x-landing.ui.menu-option-important href="{{ route('welcome') }}">
                Página principal
            </x-landing.ui.menu-option-important>
        </x-landing.ui.menu-options>

        {{-- <x-landing.ui.menu-option-important href="{{ route('welcome') }}">
            Página principal
        </x-landing.ui.menu-option-important> --}}
    </div>
    </nav>
</header>