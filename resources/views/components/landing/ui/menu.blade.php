<div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">

    <!-- Logo -->
    <x-landing.ui.menu-logo-usb>
    </x-landing.ui.menu-logo-usb>

    <!-- Menú -->
    <x-landing.ui.menu-options>
        <x-landing.ui.menu-option href="#inicio">
            Inicio
        </x-landing.ui.menu-option>
        <x-landing.ui.menu-option href="#beneficios">
            Beneficios
        </x-landing.ui.menu-option>
        <x-landing.ui.menu-option href="#caracteristicas">
            Caracteristicas
        </x-landing.ui.menu-option>
        <x-landing.ui.menu-option href="#testimonios">
            Testimonios
        </x-landing.ui.menu-option>
        <x-landing.ui.menu-option href="#contactos">
            Contactos
        </x-landing.ui.menu-option>
        @auth
            <x-landing.ui.menu-option-important href="{{ route('dashboard') }}">
                Ingresar
            </x-landing.ui.menu-option-important>
        @else
            <x-landing.ui.menu-option-important href="{{ route('login') }}">
                Iniciar sesión
            </x-landing.ui.menu-option-important>
        @endauth
    </x-landing.ui.menu-options>

    <x-landing.ui.menu-btn-mobile>
    </x-landing.ui.menu-btn-mobile>
</div>