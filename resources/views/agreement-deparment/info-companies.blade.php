<x-app-layout>
    <div class="max-w-6xl mx-auto">
        <!-- Información de la Compañía -->
        <div
            class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover hover:-translate-y-0.5">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-start gap-6">
                    <!-- Logo de la compañía -->
                    <img class="w-28 h-28 md:w-32 md:h-32 rounded-xl object-cover border-4 border-blue-500 shadow-lg transition-transform duration-300 hover:scale-105 mx-auto md:mx-0"
                        src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="Logo de la compañía">

                    <!-- Información de nombre y sector -->
                    <div class="flex-1 min-w-0 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-2">{{$company->name}}</h1>
                        <p class="text-gray-600 text-lg mb-4 leading-relaxed">Sector: {{ $company->sector->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <!-- Columna izquierda -->
            <div class="lg:col-span-2 space-y-5">
                <!-- Información Personal -->
                <div class="bg-white rounded-xl shadow-custom border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
                    x-data="{ expanded: true }">
                    <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                        @click="expanded = !expanded">
                        <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                            <i class="fas fa-building mr-3 text-blue-500"></i>
                            Información de la Compañía
                        </h2>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                            :class="{ 'rotate-180': expanded }"></i>
                    </div>
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                        <div class="flex items-center py-3 border-b border-gray-100">
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4 text-blue-500">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="font-semibold text-blue-800 min-w-28">Correo:</span>
                            <span class="text-gray-700 ml-4">{{ $company->email }}</span>
                        </div>
                        <div class="flex items-center py-3 border-b border-gray-100">
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4 text-blue-500">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <span class="font-semibold text-blue-800 min-w-28">Encargado:</span>
                            <span class="text-gray-700 ml-4">{{$company->name_manager}}</span>
                        </div>
                        <div class="flex items-center py-3">
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4 text-blue-500">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="font-semibold text-blue-800 min-w-28">Ubicación principal:</span>
                            <span class="text-gray-700 ml-4">{{ $company->locations->first()->full_address }}</span>
                        </div>
                    </div>
                </div>

                <!-- Localizaciones -->
                <div class="bg-white rounded-xl shadow-custom border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
                    x-data="{ expanded: true }">
                    <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                            <i class="fas fa-map-marked-alt mr-3 text-blue-500"></i>
                            Localizaciones
                        </h2>
                        <button
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold flex items-center transition-colors duration-200 hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i> Agregar
                        </button>
                    </div>
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                            @foreach ($company->locations as $location)
                                <div
                                    class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500 transition-all duration-200 hover:bg-blue-100 hover:translate-x-1">
                                    <div class="flex justify-between py-2 border-b border-blue-100">
                                        <span class="font-medium text-blue-800">Teléfono:</span>
                                        <span class="text-gray-700">{{$location->phone_number}}</span>
                                    </div>
                                    <div class="flex justify-between py-2">
                                        <span class="font-medium text-blue-800">Dirección:</span>
                                        <span class="text-gray-700">{{ $location->full_address }}</span>
                                    </div>
                                </div>
                            @endforeach

                            <div
                                class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500 transition-all duration-200 hover:bg-blue-100 hover:translate-x-1">
                                <div class="flex justify-between py-2 border-b border-blue-100">
                                    <span class="font-medium text-blue-800">Teléfono:</span>
                                    <span class="text-gray-700">+591 2 7654321</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="font-medium text-blue-800">Dirección:</span>
                                    <span class="text-gray-700">Av. Comercio #456, El Alto</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="space-y-5">
                <!-- Estadísticas rápidas -->
                <div
                    class="bg-white rounded-xl shadow-custom border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-custom-hover">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                            <i class="fas fa-chart-bar mr-3 text-blue-500"></i>
                            Estadísticas
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span class="font-semibold text-blue-800">Pasantes Totales</span>
                                </div>
                                <span class="text-2xl font-bold text-blue-600">8</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span class="font-semibold text-green-800">Pasantías Creadas</span>
                                </div>
                                <span class="text-2xl font-bold text-green-600">24</span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div
                    class="bg-white rounded-xl shadow-custom border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-custom-hover">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                            <i class="fas fa-bolt mr-3 text-blue-500"></i>
                            Acciones Rápidas
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="space-y-3">
                            <a href="{{ route("create.internship", ['companyId' => $company->id]) }}">
                                <button
                                    class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold flex items-center justify-center transition-colors duration-200 hover:bg-blue-600">
                                    <i class="fas fa-plus-circle mr-2"></i> Nueva Pasantía
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pasantías actuales -->
        <div class="bg-white rounded-xl shadow-custom border border-gray-200 my-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
            x-data="{ expanded: true }">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                @click="expanded = !expanded">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-briefcase mr-3 text-blue-500"></i>
                    Pasantías Actuales
                </h2>
                <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                @forelse ($internshipCurrent as $internship)
                    <div
                        class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-5 mb-5 border-l-4 border-blue-500 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                            <h3 class="text-xl font-semibold text-blue-800">{{$internship->location->full_address}}</h3>
                            <span class="bg-blue-500 text-white px-3 py-1.5 rounded-full text-sm font-medium mt-2 md:mt-0">
                                Activa
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Fecha de inicio:</span>
                                <span class="text-gray-700">{{$internship->start_date->format("d/m/Y")}}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Fecha de final:</span>
                                <span class="text-gray-700">{{ $internship->end_date->format("d/m/Y") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Horario:</span>
                                <span class="text-gray-700">{{ $internship->entry_time->format("H:i") }} -
                                    {{ $internship->exit_time->format("H:i") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Vacantes totales:</span>
                                <span class="text-gray-700">{{ $internship->vacant }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white md:col-span-1">
                                <span class="font-semibold text-blue-800">Fecha de limite de postulación:</span>
                                <span
                                    class="text-gray-700">{{ $internship->postulation_limit_date->format("d/m/Y") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white md:col-span-1">
                                <span class="font-semibold text-blue-800">Carrera requerida: </span>
                                <span
                                    class="text-gray-700">{{$internship->career->name }}</span>
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('internship.show', ['idIntership' => $internship->id]) }}"
                                class="text-blue-500 font-semibold flex items-center justify-end transition-colors duration-200 hover:text-blue-700 group">
                                Más información <i
                                    class="fas fa-arrow-right ml-2 transition-transform duration-200 group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div>
                        <x-ui.notif.info>No se tiene alguna pasantía actual</x-ui.notif.info>
                    </div>
                @endforelse

            </div>
        </div>

        <div class="bg-white rounded-xl shadow-custom border border-gray-200 my-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
            x-data="{ expanded: true }">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                @click="expanded = !expanded">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-clock mr-3 text-blue-500"></i>
                    Pasantías En Espera
                </h2>
                <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                @forelse ($internshipWait as $internship)
                    <div
                        class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-5 mb-5 border-l-4 border-blue-500 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                            <h3 class="text-xl font-semibold text-blue-800">{{$internship->location->full_address}}</h3>
                            <span
                                class="bg-orange-400 text-white px-3 py-1.5 rounded-full text-sm font-medium mt-2 md:mt-0">
                                En Espera
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Fecha de inicio:</span>
                                <span class="text-gray-700">{{$internship->start_date->format("d/m/Y")}}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Fecha de final:</span>
                                <span class="text-gray-700">{{ $internship->end_date->format("d/m/Y") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Horario</span>
                                <span class="text-gray-700">{{ $internship->entry_time->format("H:i") }} -
                                    {{ $internship->exit_time->format("H:i") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                                <span class="font-semibold text-blue-800">Vacantes totales:</span>
                                <span class="text-gray-700">{{ $internship->vacant }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white md:col-span-1">
                                <span class="font-semibold text-blue-800">Fecha de limite de postulación:</span>
                                <span class="text-gray-700">{{ $internship->postulation_limit_date->format("d/m/Y") }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white md:col-span-1">
                                <span class="font-semibold text-blue-800">Carrera requerida: </span>
                                <span
                                    class="text-gray-700">{{$internship->career->name }}</span>
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('internship.show', ['idIntership' => $internship->id]) }}"
                                class="text-blue-500 font-semibold flex items-center justify-end transition-colors duration-200 hover:text-blue-700 group">
                                Más información <i
                                    class="fas fa-arrow-right ml-2 transition-transform duration-200 group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <x-ui.notif.info>
                        No se tiene pasantías futuras
                    </x-ui.notif.info>
                @endforelse

            </div>
        </div>

        <!-- Pasantías anteriores -->
        <div class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
            x-data="{ expanded: false }">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                @click="expanded = !expanded">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-history mr-3 text-blue-500"></i>
                    Pasantías Anteriores
                </h2>
                <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;" class="p-5">
                <div
                    class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-5 mb-5 border-l-4 border-blue-500 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                        <h3 class="text-xl font-semibold text-blue-800">Sucursal Norte</h3>
                        <span class="bg-gray-500 text-white px-3 py-1.5 rounded-full text-sm font-medium mt-2 md:mt-0">
                            Completada
                        </span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Fecha de inicio:</span>
                            <span class="text-gray-700">10/08/2022</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Fecha de final:</span>
                            <span class="text-gray-700">10/02/2023</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Hora inicial:</span>
                            <span class="text-gray-700">09:00 AM</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Hora final:</span>
                            <span class="text-gray-700">05:00 PM</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Vacantes totales:</span>
                            <span class="text-gray-700">4</span>
                        </div>
                        <div
                            class="flex justify-between items-center p-3 bg-white bg-opacity-70 rounded-lg transition-colors duration-200 hover:bg-white">
                            <span class="font-semibold text-blue-800">Fecha de aceptación:</span>
                            <span class="text-gray-700">05/08/2022</span>
                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <a href="{{ route('internship.show', ['idIntership' => $internship->id]) }}"
                            class="text-blue-500 font-semibold flex items-center justify-end transition-colors duration-200 hover:text-blue-700 group">
                            Más información <i
                                class="fas fa-arrow-right ml-2 transition-transform duration-200 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>