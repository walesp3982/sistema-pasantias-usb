<x-app-layout>
    <x-ui.section>
        <x-ui.title>
            Pasantías
        </x-ui.title>
    </x-ui.section>

    <x-ui.section>
        <div class="max-w-7xl mx-auto mb-4">
            <button onclick="toggleSection('wait')"
                class="w-full px-6 py-4 mb-4 flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    <h2 class="text-xl font-bold text-white">Pasantías Disponibles</h2>
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $internships->count() }}</span>
                </div>
                <svg id="icon-wait" class="w-6 h-6 text-white transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
        <div id="section-wait" class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 max-w-7xl mx-auto mb-3">
            @foreach ($internships as $internship)
            <div
                class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <!-- Header Section -->
                <div class="flex justify-between items-start mb-6">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{$internship->company->name}}</h3>
                        <div class="space-y-1.5 text-sm text-gray-700">
                            <p><span class="font-semibold">Fecha de comienzo:</span>
                                {{ $internship->start_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha de finalización:</span>
                                {{ $internship->end_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha límite de postulación:</span>
                                {{ $internship->postulation_limit_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Ubicación:</span> {{$internship->location->full_address}}</p>
                        </div>
                    </div>

                    <!-- Vacantes Info Box -->
                    <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 shadow-md ml-4">
                        <p class="text-xs font-semibold text-gray-600 mb-1">Vacante Totales: <span
                                class="text-lg text-blue-600">{{ $internship->vacant }}</span></p>
                        <p class="text-xs font-semibold text-gray-600">Vacante Disponibles: <span
                                class="text-lg text-green-600">{{ $internship->vacant - $internship->accept_count
                                }}</span>
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('pdf.internship', ['internshipId' => $internship->id]) }}">
                                <x-ui.btn.info>
                                    <x-slot:icon>
                                        <i class="fa-solid fa-file"></i>
                                    </x-slot:icon>
                                    Convocatoria
                                </x-ui.btn.info>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-4 gap-3">
                    <!-- Enviadas -->
                    <div
                        class="bg-purple-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{ $internship->send_count }}</p>
                        <p class="text-sm font-semibold text-white">Enviadas</p>
                    </div>

                    <!-- Rechazadas -->
                    <div
                        class="bg-orange-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->reject_count}}</p>
                        <p class="text-sm font-semibold text-white">Rechazadas</p>
                    </div>

                    <!-- Verificadas -->
                    <div
                        class="bg-yellow-400 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-gray-800 mb-1">{{$internship->verify_count}}</p>
                        <p class="text-sm font-semibold text-gray-800">Verificadas</p>
                    </div>

                    <!-- Aceptadas -->
                    <div
                        class="bg-green-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->accept_count}}</p>
                        <p class="text-sm font-semibold text-white">Aceptadas</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="max-w-7xl mx-auto mb-4">
            <button onclick="toggleSection('current')"
                class="w-full px-6 py-4 mb-4 flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 bg-yellow-300 rounded-full animate-pulse"></div>
                    <h2 class="text-xl font-bold text-white">Pasantías Actuales</h2>
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $internshipCurrents->count() }}</span>
                </div>
                <svg id="icon-current" class="w-6 h-6 text-white transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
        <div id="section-current" class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 max-w-7xl mx-auto  mb-3">
            @foreach ($internshipCurrents as $internship)
            <div
                class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <!-- Header Section -->
                <div class="flex justify-between items-start mb-6">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{$internship->company->name}}</h3>
                        <div class="space-y-1.5 text-sm text-gray-700">
                            <p><span class="font-semibold">Fecha de comienzo:</span>
                                {{ $internship->start_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha de finalización:</span>
                                {{ $internship->end_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha límite de postulación:</span>
                                {{ $internship->postulation_limit_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Ubicación:</span> {{$internship->location->full_address}}</p>
                        </div>
                    </div>

                    <!-- Vacantes Info Box -->
                    <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 shadow-md ml-4">
                        <p class="text-xs font-semibold text-gray-600 mb-1">Vacante Totales: <span
                                class="text-lg text-blue-600">{{ $internship->vacant }}</span></p>
                        <p class="text-xs font-semibold text-gray-600">Vacante Disponibles: <span
                                class="text-lg text-green-600">{{ $internship->vacant - $internship->accept_count
                                }}</span>
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-4 gap-3">
                    <!-- Enviadas -->
                    <div
                        class="bg-purple-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{ $internship->send_count }}</p>
                        <p class="text-sm font-semibold text-white">Enviadas</p>
                    </div>

                    <!-- Rechazadas -->
                    <div
                        class="bg-orange-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->reject_count}}</p>
                        <p class="text-sm font-semibold text-white">Rechazadas</p>
                    </div>

                    <!-- Verificadas -->
                    <div
                        class="bg-yellow-400 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-gray-800 mb-1">{{$internship->verify_count}}</p>
                        <p class="text-sm font-semibold text-gray-800">Verificadas</p>
                    </div>

                    <!-- Aceptadas -->
                    <div
                        class="bg-green-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->accept_count}}</p>
                        <p class="text-sm font-semibold text-white">Aceptadas</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <div class="max-w-7xl mx-auto mb-4">
            <button onclick="toggleSection('finished')"
                class="w-full px-6 py-4 mb-4 flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 bg-gray-300 rounded-full animate-pulse"></div>
                    <h2 class="text-xl font-bold text-white">Pasantías Disponibles</h2>
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $internshipFinished->count() }}</span>
                </div>
                <svg id="icon-finished" class="w-6 h-6 text-white transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
        <div id="section-finished" class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1
         gap-6 max-w-7xl mx-auto  mb-3">
            @foreach ($internshipFinished as $internship)
            <div
                class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <!-- Header Section -->
                <div class="flex justify-between items-start mb-6">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{$internship->company->name}}</h3>
                        <div class="space-y-1.5 text-sm text-gray-700">
                            <p><span class="font-semibold">Fecha de comienzo:</span>
                                {{ $internship->start_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha de finalización:</span>
                                {{ $internship->end_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Fecha límite de postulación:</span>
                                {{ $internship->postulation_limit_date->format("d M Y") }}</p>
                            <p><span class="font-semibold">Ubicación:</span> {{$internship->location->full_address}}</p>
                        </div>
                    </div>

                    <!-- Vacantes Info Box -->
                    <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 shadow-md ml-4">
                        <p class="text-xs font-semibold text-gray-600 mb-1">Vacante Totales: <span
                                class="text-lg text-blue-600">{{ $internship->vacant }}</span></p>
                        <p class="text-xs font-semibold text-gray-600">Vacante Disponibles: <span
                                class="text-lg text-green-600">{{ $internship->vacant - $internship->accept_count
                                }}</span>
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-4 gap-3">
                    <!-- Enviadas -->
                    <div
                        class="bg-purple-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{ $internship->send_count }}</p>
                        <p class="text-sm font-semibold text-white">Enviadas</p>
                    </div>

                    <!-- Rechazadas -->
                    <div
                        class="bg-orange-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->reject_count}}</p>
                        <p class="text-sm font-semibold text-white">Rechazadas</p>
                    </div>

                    <!-- Verificadas -->
                    <div
                        class="bg-yellow-400 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-gray-800 mb-1">{{$internship->verify_count}}</p>
                        <p class="text-sm font-semibold text-gray-800">Verificadas</p>
                    </div>

                    <!-- Aceptadas -->
                    <div
                        class="bg-green-500 rounded-lg p-4 text-center shadow-md hover:scale-105 transition-transform duration-200">
                        <p class="text-3xl font-bold text-white mb-1">{{$internship->accept_count}}</p>
                        <p class="text-sm font-semibold text-white">Aceptadas</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </x-ui.section>
    <script>
        function toggleSection(sectionId) {
            const section = document.getElementById('section-' + sectionId);
            const icon = document.getElementById('icon-' + sectionId);

            if (section.classList.contains('hidden')) {
                section.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                section.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</x-app-layout>
