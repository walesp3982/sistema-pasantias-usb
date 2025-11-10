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

{{--

<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

</body>

</html> --}}

<body class="m-0 bg-gradient-to-br from-blue-50 to-blue-100 text-gray-800">

    <!-- Botón del menú -->


    <!-- Overlay (fondo oscuro cuando el sidebar está abierto) -->
    <div id="overlay" onclick="toggleMenu()"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden transition-opacity duration-300">
    </div>
    <!-- Menú lateral -->
    <nav id="sidebar"
        class="fixed top-0 left-0 w-64 h-full bg-white border-r border-gray-300 flex flex-col justify-between shadow-xl z-40  transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div>
            <div class="text-center pt-32 pb-10 px-0 bg-gray-50 border-b border-gray-200">
                <div class="w-full h-full text-center">
                    <img id="userPhoto"
                        class="w-20 h-20 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
                        src="https://i.pinimg.com/736x/d9/7b/bb/d97bbb08017ac2309307f0822e63d082.jpg" alt="User">
                </div>
                {{-- <img src="logousb.png" alt="logo salesiana" class="w-20 mx-auto mb-2"> --}}
                <h2 class="text-bold text-xl  text-gray-800 my-1">Josué Walter Espejo Guarachi</h2>
                <p class="text-sm text-gray-500">Estudiante</p>
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
                        <i class="fa-solid fa-user-graduate mr-2.5 text-blue-600"></i> Estudiantes
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center px-5 py-3 text-gray-800 no-underline text-base hover:bg-blue-50 hover:border-l-4 hover:border-blue-600 transition-all">
                        <i class="fa-solid fa-chalkboard-user mr-2.5 text-blue-600"></i> Tutores
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
    </nav>

    <!-- Encabezado superior -->
    <header
        class="fixed top-0 left-0 right-0 bg-white border-b border-gray-200 flex justify-between items-center px-8 py-3 shadow-sm z-[500]">

        <div class="flex flex-row">
            <div onclick="toggleMenu()"
                class=" top-5 left-5 text-3xl text-blue-600 bg-white border-2 border-gray-300 px-2 py-2 rounded-lg cursor-pointer z-[1000] shadow-md hover:bg-blue-600 hover:text-white transition-all">
                <i class="fa-solid fa-bars"></i>
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
            {{-- <h2 class="text-blue-600 text-2xl font-semibold mb-4">Bienvenido al Sistema Web de Control de Pasantías
            </h2>
            <p class="text-gray-500 mt-2.5 text-base">
                Este sistema permite gestionar el proceso de pasantías universitarias,
                facilitando el registro de estudiantes, la asignación de tutores, la revisión de informes
                y la generación de reportes institucionales.
            </p>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] gap-5 mt-8">
                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-user-graduate text-4xl text-blue-600 mb-2.5"></i>
                    <h3 class="text-gray-800 mb-2.5 font-semibold">Estudiantes</h3>
                    <p class="text-gray-500 text-sm">Registro y seguimiento académico de pasantes.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-chalkboard-user text-4xl text-blue-600 mb-2.5"></i>
                    <h3 class="text-gray-800 mb-2.5 font-semibold">Tutores</h3>
                    <p class="text-gray-500 text-sm">Asignación y control de tutores supervisores.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-file-lines text-4xl text-blue-600 mb-2.5"></i>
                    <h3 class="text-gray-800 mb-2.5 font-semibold">Informes</h3>
                    <p class="text-gray-500 text-sm">Revisión, validación y control documental.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-list-check text-4xl text-blue-600 mb-2.5"></i>
                    <h3 class="text-gray-800 mb-2.5 font-semibold">Seguimiento</h3>
                    <p class="text-gray-500 text-sm">Monitoreo del progreso de cada pasante.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-md hover:-translate-y-1 hover:bg-blue-50 transition-all">
                    <i class="fa-solid fa-chart-line text-4xl text-blue-600 mb-2.5"></i>
                    <h3 class="text-gray-800 mb-2.5 font-semibold">Reportes</h3>
                    <p class="text-gray-500 text-sm">Generación de reportes y estadísticas del sistema.</p>
                </div>
            </div> --}}
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