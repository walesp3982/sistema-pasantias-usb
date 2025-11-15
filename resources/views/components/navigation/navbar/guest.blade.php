<header class="py-4 sticky top-0 left-0 w-full bg-white  z-10 shadow-md">
    <nav class="w-full"></nav>
    <div class="max-w-6xl mx-auto px-5 flex justify-between  items-center">

        <!-- Logo -->
        <x-navigation.logo>
        </x-navigation.logo>

        <!-- Menú -->
        <x-navigation.box-menu>
            <x-navigation.item-important href="{{ route('welcome') }}">
                Página principal
            </x-navigation.item-important>
        </x-navigation.box-menu>
    </div>
    </nav>
</header>