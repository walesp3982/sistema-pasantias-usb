<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

<body class="m-0 bg-gradient-to-br from-blue-50 to-blue-100 text-gray-800">

    <!-- Botón del menú -->


    <!-- Overlay (fondo oscuro cuando el sidebar está abierto) -->
    <div id="overlay" onclick="toggleMenu()"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden transition-opacity duration-300">
    </div>
    <!-- Menú lateral -->
    @livewire('app.navside')
    {{-- <nav id="sidebar"
        class="fixed top-0 left-0 w-64 h-full bg-white border-r border-gray-300 flex flex-col justify-between shadow-xl z-40  transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div>
            <div class="text-center pt-[7rem] pb-5 px-0 bg-gray-50 border-b border-gray-200">
                @livewire('app.navbar-profile')
            </div>

            <ul class="list-none p-0 m-0">
                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-house mr-2.5 text-blue-600"></i> Inicio
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-file-lines mr-2.5 text-blue-600"></i> Informes
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-list-check mr-2.5 text-blue-600"></i> Seguimiento
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-chart-line mr-2.5 text-blue-600"></i> Reportes
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-gear mr-2.5 text-blue-600"></i> Configuración
                    </a>
                </li>
            </ul>
        </div>

        <div class="text-center p-4 border-t border-gray-200 bg-gray-50">
            <a href="#" class="no-underline text-gray-800 hover:text-blue-600 transition-colors">
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Salir
            </a>
        </div>
    </nav> --}}

    <!-- Encabezado superior -->
    <header
        class="fixed top-0 left-0 right-0 bg-white border-b border-gray-200 flex justify-between items-center px-8 py-3 shadow-sm z-[500]">

        <div class="flex flex-row">
            <div onclick="toggleMenu()"
                class=" top-5 left-5 text-3xl text-blue-600 bg-white border-2 border-gray-300 px-2 py-2 rounded-lg cursor-pointer z-[1000] shadow-md hover:bg-blue-600 hover:text-white transition-all">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div>
                <img src="{{ Vite::asset("resources/images/logo-usb.png") }}" alt="" class="h-12 w-auto ml-5">
            </div>
            <div>
                <h1 class="text-xl text-blue-600 pl-5 mb-1">Universidad Salesiana de Bolivia</h1>
                <h2 class="text-base text-gray-500 pl-5 font-normal">Sistema Web de Control de Pasantías</h2>
            </div>

        </div>

        {{-- <div>
            <img id="userPhoto"
                class="w-11 h-11 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform"
                src="https://i.pinimg.com/736x/d9/7b/bb/d97bbb08017ac2309307f0822e63d082.jpg" alt="User">
            <input type="file" id="fileInput" accept="image/*" class="hidden">
        </div> --}}
    </header>

    <!-- Contenido principal -->
    <main id="mainContent" class="w-full h-full pt-32 px-40 pb-20 transition-all duration-400">

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
