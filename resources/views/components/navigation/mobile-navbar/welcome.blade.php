<nav >
    <!-- Menú móvil -->
    <x-landing.ui.menu-mobile>
        <x-landing.ui.menu-option-mobile href="#inicio">
            Inicio
        </x-landing.ui.menu-option-mobile>
        <x-landing.ui.menu-option-mobile href="#beneficios">
            Beneficios
        </x-landing.ui.menu-option-mobile>
        <x-landing.ui.menu-option-mobile href="#caracteristicas">
            Caracteristicas
        </x-landing.ui.menu-option-mobile>
        <x-landing.ui.menu-option-mobile href="#testimonios">
            Testimonios
        </x-landing.ui.menu-option-mobile>
        {{-- <x-landing.ui.menu-option-mobile href="#contacto">
            Contacto
        </x-landing.ui.menu-option-mobile> --}}
        @auth
            <x-landing.ui.menu-option-important-mobile href="{{ route('dashboard') }}">
                Ingresar
            </x-landing.ui.menu-option-important-mobile>
        @else
            <x-landing.ui.menu-option-important-mobile href="{{ route('login') }}">
                Iniciar sesión
            </x-landing.ui.menu-option-important-mobile>
        @endauth

    </x-landing.ui.menu-mobile>
</nav>