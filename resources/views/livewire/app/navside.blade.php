<nav id="sidebar"
        class="fixed top-0 left-0 w-64 h-full bg-white border-r border-gray-300 flex flex-col justify-between shadow-xl z-40  transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div>
            <div class="text-center pt-[7rem] pb-5 px-0 bg-gray-50 border-b border-gray-200">
                @livewire('app.navbar-profile')
            </div>
            <ul class="list-none p-0 m-0">
                <x-ui-app.options-navside icon="fa-solid fa-house" href="#">
                    Inicio
                </x-ui-app.options-navside>

                <x-ui-app.options-navside icon="fa-solid fa-file-lines" href="#">
                    Informes
                </x-ui-app.options-navside>

                <x-ui-app.options-navside icon="fa-solid fa-list-check" href="#">
                    Seguimiento
                </x-ui-app.options-navside>

                <x-ui-app.options-navside icon="fa-solid fa-chart-line" href="#">
                    Reportes
                </x-ui-app.options-navside>

                <x-ui-app.options-navside icon="fa-solid fa-gear" href="#">
                    Configuraciones
                </x-ui-app.options-navside>
            </ul>
        </div>

        {{-- <div class="text-center p-4 border-t border-gray-200 bg-gray-50">
            <a href="#" class="no-underline text-gray-800 hover:text-blue-600 transition-colors">
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Salir
            </a>
        </div> --}}
        @livewire('app.navside-logout')
    </nav>
