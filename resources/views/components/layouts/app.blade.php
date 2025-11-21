<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar {
            transition: left 0.4s ease;
        }

        .sidebar.active {
            left: 0;
        }
    </style>
</head>

<body class="m-0 bg-gradient-to-br min-h-screen from-blue-50 to-blue-200 text-gray-800">

    <!-- Botón del menú -->


    <!-- Overlay (fondo oscuro cuando el sidebar está abierto) -->
    <div id="overlay" onclick="toggleMenu()"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden transition-opacity duration-300">
    </div>
    <!-- Menú lateral -->
    <x-navigation.navside.app></x-navigation.navside.app>

    <!-- Encabezado superior -->
    <header
        class="sticky top-0 left-0 right-0 bg-white border-b border-gray-200 flex justify-between items-center px-8 py-3 shadow-sm z-[500]">

        <div class="flex flex-row">
            <div onclick="toggleMenu()"
                class=" top-5 left-5 text-3xl text-blue-600 bg-white border-2 border-gray-300 px-2 py-2 rounded-lg cursor-pointer z-[1000] shadow-md hover:bg-blue-600 hover:text-white transition-all">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="ml-2">
                <x-navigation.logo></x-navigation.logo>
            </div>
            <div class="hidden md:block">
                <h1 class="text-xl text-blue-600 pl-5 mb-1">Universidad Salesiana de Bolivia</h1>
                <h2 class="text-base text-gray-500 pl-5 font-normal">Sistema Web de Control de Pasantías</h2>
            </div>

        </div>
    </header>

    <!-- Contenido principal -->
    <main id="mainContent" class="w-full h-full pt-20 px-32 pb-20 transition-all duration-400
         lg:px-60">

        {{ $slot }}
    </main>

    <script>
        // Toggle del Sidebar
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Toggle del Dropdown dentro del Sidebar
        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownIcon = document.getElementById('dropdownIcon');

            dropdownMenu.classList.toggle('hidden');
            dropdownIcon.classList.toggle('rotate-180');
        }

        // Cerrar sidebar al presionar Escape
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');

                if (!sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        });
    </script>
</body>

</html>
