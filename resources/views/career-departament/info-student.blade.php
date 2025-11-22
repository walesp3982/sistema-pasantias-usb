<x-app-layout>
    <!-- Encabezado principal con foto de perfil -->
    <div x-data="{ currentInternships: @json('interships ?? []') }">
        <div
            class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 p-6 transition-all duration-300 hover:shadow-md">
            <div class="flex items-start space-x-4">
                <!-- Foto de perfil interactiva -->
                <img id="userPhoto"
                    class="w-24 h-24 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
                    src="{{ asset("images/default/avatar_default.webp")}}" alt="User">

                <!-- Información de nombre y carrera -->
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2 truncate">{{ $student->full_name }}</h1>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i class="fas fa-graduation-cap text-blue-500"></i>
                            <span class="font-medium">Estudiante de:</span>
                            <span class="text-blue-600 font-semibold">{{$student->career->name}}</span>
                        </div>
                        <div class="flex items-center space-x-1 bg-green-100 px-2 py-1 rounded-full">
                            <i class="fas fa-circle text-green-500 text-xs"></i>
                            <span class="text-green-700 text-sm font-medium">Activo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Personal -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 p-6 transition-all duration-300 hover:shadow-md"
            x-data="{ expanded: true }">
            <div class="flex items-center justify-between cursor-pointer" @click="expanded = !expanded">
                <h2 class="text-lg font-semibold text-blue-600 border-b-2 border-blue-100 pb-2 flex items-center">
                    <i class="fas fa-user-circle mr-2"></i>
                    Información Personal
                </h2>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-4 space-y-3">
                <div
                    class="flex items-center space-x-4 p-3 rounded-lg bg-gray-50 hover:bg-blue-50 transition-colors duration-200">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-envelope text-blue-500 text-sm"></i>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Correo:</span>
                        <span class="text-gray-600 ml-2">{{$student->user->email}}</span>
                    </div>
                </div>
                <div
                    class="flex items-center space-x-4 p-3 rounded-lg bg-gray-50 hover:bg-blue-50 transition-colors duration-200">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-blue-500 text-sm"></i>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Ubicación:</span>
                        <span
                            class="text-gray-600 ml-2">{{  $student->location->full_address ?? "No se encontró una ubicación" }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Académica -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 p-6 transition-all duration-300 hover:shadow-md"
            x-data="{ expanded: true }">
            <div class="flex items-center justify-between cursor-pointer" @click="expanded = !expanded">
                <h2 class="text-lg font-semibold text-blue-600 border-b-2 border-blue-100 pb-2 flex items-center">
                    <i class="fas fa-book-open mr-2"></i>
                    Información Académica
                </h2>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div
                    class="flex items-center space-x-4 p-4 rounded-lg bg-blue-50 hover:bg-blue-100 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Semestre:</span>
                        <div class="text-2xl font-bold text-blue-600">{{ $student->semester }}</div>
                    </div>
                </div>
                <div
                    class="flex items-center space-x-4 p-4 rounded-lg bg-blue-50 hover:bg-blue-100 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Turno:</span>
                        <div class="text-xl font-bold text-blue-600">{{$student->shift->name}}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pasantías actual -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 p-6 transition-all duration-300 hover:shadow-md"
            x-data="{ expanded: true }">
            <div class="flex items-center justify-between cursor-pointer" @click="expanded = !expanded">
                <h2 class="text-lg font-semibold text-blue-600 border-b-2 border-blue-100 pb-2 flex items-center">
                    <i class="fas fa-briefcase mr-2"></i>
                    Pasantías actual
                </h2>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                <template x-for="pasantia in currentInternships" :key="pasantia.id">
                    <div
                        class="mt-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-4 border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-gray-800 text-lg" x-text="pasantia.empresa"></h3>
                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Activa
                            </span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de aceptación</span>
                                <span class="text-gray-600" x-text="pasantia.fechaAceptacion"></span>
                            </div>
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de inicio</span>
                                <span class="text-gray-600" x-text="pasantia.fechaInicio"></span>
                            </div>
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de final</span>
                                <span class="text-gray-600" x-text="pasantia.fechaFinal"></span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Postulaciones -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 p-6 transition-all duration-300 hover:shadow-md"
            x-data="{ expanded: true }">
            <div class="flex items-center justify-between cursor-pointer" @click="expanded = !expanded">
                <h2 class="text-lg font-semibold text-blue-600 border-b-2 border-blue-100 pb-2 flex items-center">
                    <i class="fas fa-file-alt mr-2"></i>
                    Postulaciones
                </h2>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                <template x-for="postulacion in applications" :key="postulacion.id">
                    <div
                        class="mt-4 bg-gradient-to-r from-yellow-50 to-amber-50 rounded-lg p-4 border-l-4 border-yellow-500 hover:shadow-md transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-gray-800 text-lg" x-text="postulacion.empresa"></h3>
                            <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Pendiente
                            </span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de inicio</span>
                                <span class="text-gray-600" x-text="postulacion.fechaInicio"></span>
                            </div>
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de final</span>
                                <span class="text-gray-600" x-text="postulacion.fechaFinal"></span>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="flex justify-center mt-4 space-x-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Pasantías anteriores -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 p-6 transition-all duration-300 hover:shadow-md"
            x-data="{ expanded: false }">
            <div class="flex items-center justify-between cursor-pointer" @click="expanded = !expanded">
                <h2 class="text-lg font-semibold text-blue-600 border-b-2 border-blue-100 pb-2 flex items-center">
                    <i class="fas fa-history mr-2"></i>
                    Pasantías anteriores
                </h2>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"
                    :class="{ 'rotate-180': expanded }"></i>
            </div>
            <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                <template x-for="pasantia in pastInternships" :key="pasantia.id">
                    <div
                        class="mt-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-4 border-l-4 border-green-500 hover:shadow-md transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-gray-800 text-lg" x-text="pasantia.empresa"></h3>
                            <span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                Completada
                            </span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de aceptación</span>
                                <span class="text-gray-600" x-text="pasantia.fechaAceptacion"></span>
                            </div>
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de final</span>
                                <span class="text-gray-600" x-text="pasantia.fechaFinal"></span>
                            </div>
                            <div class="flex justify-between items-center p-2 hover:bg-white rounded transition-colors">
                                <span class="font-medium text-gray-700">Fecha de inicio</span>
                                <span class="text-gray-600" x-text="pasantia.fechaInicio"></span>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="flex justify-center mt-4 space-x-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>