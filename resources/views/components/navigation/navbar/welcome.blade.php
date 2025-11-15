<header class="py-4 sticky top-0 left-0 w-full bg-white  z-20 shadow-md">
    <nav x-data="{open: false}" class="w-full">
        <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center z-20">
            <!-- Logo -->
            <x-navigation.logo>
            </x-navigation.logo>

            <!-- Menú -->
            <x-navigation.box-menu>
                <x-navigation.item href="#inicio">
                    Inicio
                </x-navigation.item>
                <x-navigation.item href="#beneficios">
                    Beneficios
                </x-navigation.item>
                <x-navigation.item href="#caracteristicas">
                    Caracteristicas
                </x-navigation.item>
                <x-navigation.item href="#testimonios">
                    Testimonios
                </x-navigation.item>
                @auth
                    <x-navigation.item-important href="{{ route('dashboard') }}">
                        Ingresar
                    </x-navigation.item-important>
                @else
                    <x-navigation.item-important href="{{ route('login') }}">
                        Iniciar sesión
                    </x-navigation.item-important>
                @endauth
            </x-navigation.box-menu>

            <x-navigation.btn-burguer>
            </x-navigation.btn-burguer>

        </div>
        <x-navigation.mobile-navbar.welcome>
        </x-navigation.mobile-navbar.welcome>
    </nav>
</header>