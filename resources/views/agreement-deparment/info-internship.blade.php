<x-app-layout>
    <div class="max-w-6xl mx-auto">
        <!-- Información de la Pasantía -->
        <div
            class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover hover:-translate-y-0.5">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-start gap-6">
                    <!-- Logo de la compañía -->
                    <img class="w-28 h-28 md:w-32 md:h-32 rounded-xl object-cover border-4 border-blue-500 shadow-lg transition-transform duration-300 hover:scale-105 mx-auto md:mx-0"
                        src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        alt="Logo de la compañía">

                    <!-- Información principal -->
                    <div class="flex-1 min-w-0 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-2">{{$internship->company->name}}
                        </h1>
                        <p class="text-gray-600 text-lg mb-4 leading-relaxed">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                            {{$internship->location->full_address}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información de Fechas -->
        <div
            class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover">
            <div class="p-5 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-calendar-alt mr-3 text-blue-500"></i>
                    Información de la Pasantía
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                        class="flex flex-col items-center p-4 bg-blue-50 rounded-lg transition-all duration-200 hover:bg-blue-100">
                        <div
                            class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mb-3">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <span class="font-semibold text-blue-800 mb-2">Fecha Inicial</span>
                        <span class="text-gray-700 text-lg">{{$internship->start_date->format("d/m/Y")}}</span>
                    </div>
                    <div
                        class="flex flex-col items-center p-4 bg-green-50 rounded-lg transition-all duration-200 hover:bg-green-100">
                        <div
                            class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white mb-3">
                            <i class="fas fa-calendar-times"></i>
                        </div>
                        <span class="font-semibold text-green-800 mb-2">Fecha Final</span>
                        <span class="text-gray-700 text-lg">{{$internship->end_date->format("d/m/Y")}}</span>
                    </div>
                    <div
                        class="flex flex-col items-center p-4 bg-orange-50 rounded-lg transition-all duration-200 hover:bg-orange-100">
                        <div
                            class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center text-white mb-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <span class="font-semibold text-orange-800 mb-2">Límite de Postulación</span>
                        <span
                            class="text-gray-700 text-lg">{{$internship->postulation_limit_date->format("d/m/Y")}}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Postulaciones Aceptadas -->
        <div class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
            x-data="{ expanded: true }">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                @click="expanded = !expanded">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    Postulaciones Aceptadas
                </h2>
                <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($acceptedApplications as $application)
                        <div
                            class="bg-gradient-to-r from-green-50 to-green-100 rounded-lg p-4 border-l-4 border-green-500 transition-all duration-200 hover:shadow-md hover:-translate-y-1">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-blue-800">{{$application->student->full_name}}</h3>
                                    <p class="text-gray-600 text-sm">RU: {{$application->student->ru}}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('show.student', ['idStudent' => $application->student->id]) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold inline-flex items-center transition-colors duration-200 hover:bg-blue-600">
                                    <i class="fas fa-info-circle mr-2"></i> Info
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                                <p class="text-blue-800 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    No hay postulaciones aceptadas
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Postulaciones Enviadas -->
        <div class="bg-white rounded-xl shadow-custom border border-gray-200 mb-5 overflow-hidden transition-all duration-300 hover:shadow-custom-hover"
            x-data="{ expanded: true }">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center cursor-pointer"
                @click="expanded = !expanded">
                <h2 class="text-xl font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-paper-plane mr-3 text-blue-500"></i>
                    Postulaciones Enviadas
                </h2>
                <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($sentApplications as $application)
                        <div
                            class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-4 border-l-4 border-blue-500 transition-all duration-200 hover:shadow-md hover:-translate-y-1">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-blue-800">{{$application->student->full_name}}</h3>
                                    <p class="text-gray-600 text-sm">RU: {{$application->student->ru}}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('show.student', ['idStudent' => $application->student->id]) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold inline-flex items-center transition-colors duration-200 hover:bg-blue-600">
                                    <i class="fas fa-info-circle mr-2"></i> Info
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                                <p class="text-blue-800 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    No hay postulaciones enviadas
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>