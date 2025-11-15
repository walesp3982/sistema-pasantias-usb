<nav>
    <!-- Menú móvil -->
    <x-navigation.mobile-navbar.box>
        <x-navigation.mobile-navbar.item href="#inicio">
            Inicio
        </x-navigation.mobile-navbar.item>
        <x-navigation.mobile-navbar.item href="#beneficios">
            Beneficios
        </x-navigation.mobile-navbar.item>
        <x-navigation.mobile-navbar.item href="#caracteristicas">
            Caracteristicas
        </x-navigation.mobile-navbar.item>
        <x-navigation.mobile-navbar.item href="#testimonios">
            Testimonios
        </x-navigation.mobile-navbar.item>
        @auth
            <x-navigation.mobile-navbar.item-important href="{{ route('dashboard') }}">
                Ingresar
            </x-navigation.mobile-navbar.item-important>
        @else
            <x-navigation.mobile-navbar.item-important href="{{ route('login') }}">
                Iniciar sesión
            </x-navigation.mobile-navbar.item-important>
        @endauth
    </x-navigation.mobile-navbar.box>
</nav>