<x-app-layout>
    <x-ui.section>
        <x-ui.title>
            Pasantías actuales
        </x-ui.title>
    </x-ui.section>

    <x-ui.section>
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6 max-w-7xl mx-auto">
            @foreach ($internships as $internship)
                <div
                    class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <!-- Header Section -->
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{$internship->company->name}}</h3>
                            <div class="space-y-1.5 text-sm text-gray-700">
                                <p><span class="font-semibold">Fecha de comienzo:</span> {{ $internship->start_date->format("d M Y") }}</p>
                                <p><span class="font-semibold">Fecha de finalización:</span> {{ $internship->end_date->format("d M Y") }}</p>
                                <p><span class="font-semibold">Fecha límite de postulación:</span> {{ $internship->postulation_limit_date->format("d M Y") }}</p>
                                <p><span class="font-semibold">Ubicación:</span> {{$internship->location->full_address}}</p>
                            </div>
                        </div>

                        <!-- Vacantes Info Box -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 shadow-md ml-4">
                            <p class="text-xs font-semibold text-gray-600 mb-1">Vacante Totales: <span
                                    class="text-lg text-blue-600">{{ $internship->vacant }}</span></p>
                            <p class="text-xs font-semibold text-gray-600">Vacante Disponibles: <span
                                    class="text-lg text-green-600">{{ $internship->vacant - $internship->accept_count }}</span></p>
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

</x-app-layout>