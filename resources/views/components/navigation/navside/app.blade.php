<nav id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-white border-r border-gray-300 flex flex-col justify-between shadow-xl z-40  transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div>
        <div class="text-center pt-[7rem] pb-5 px-0 bg-gray-50 border-b border-gray-200">
            @livewire('auth.profile')
        </div>
        <ul class="list-none p-0 m-0">
            <x-navigation.navside.option icon="fa-solid fa-house" href="{{ route('dashboard') }}">
                Inicio
            </x-navigation.navside.option>
            @role("student")
                <x-navigation.navside.option icon="fa-solid fa-file-lines" href="{{ route('search.intership') }}">
                    Buscar pasantías
                </x-navigation.navside.option>

                <x-navigation.navside.option icon="fa-solid fa-list-check" href="#">
                    Seguimiento
                </x-navigation.navside.option>

                <x-navigation.navside.option icon="fa-solid fa-chart-line" href="#">
                    Reportes
                </x-navigation.navside.option>
            @endrole
            @role("carrer-department")
            <x-navigation.navside.option icon="fa-solid fa-chart-line" href="#">
                    Reportes pasantes
                </x-navigation.navside.option>

                <x-navigation.navside.option icon="fa-solid fa-chart-line" href="#">
                    Evaluaciones 
                </x-navigation.navside.option>

                <x-navigation.navside.option icon="fa-solid fa-chart-line" href="#">
                    Seguimiento pasantes
                </x-navigation.navside.option>
            @endrole
            @role("agreements-departament")
            <x-navigation.navside.option icon="fa-solid fa-chart-line" href="#">
                    Reportes
                </x-navigation.navside.option>
            @endrole
            <x-navigation.navside.option icon="fa-solid fa-gear" href="{{ route('config') }}">
                Configuraciones
            </x-navigation.navside.option>
        </ul>
    </div>

    @livewire('auth.logout')
</nav>