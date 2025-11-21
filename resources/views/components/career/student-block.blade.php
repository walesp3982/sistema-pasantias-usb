<div x-data="{isOpen{{ $student->id }}:false}">

    <!-- TARJETA PRINCIPAL -->
    <div class="p-5 flex items-center justify-between border-y">
        <!-- DATOS CENTRALES -->
        <!-- LOGO + BADGE -->
        <div class="">
            {{-- <span class="inline-flex items-center justify-center 
            aspect-square
            rounded-2xl
            w-12 h-12 
            bg-gradient-to-br from-blue-900 to-blue-500 
            text-white text-xl">
                <i class="fas fa-user-graduate"></i>
            </span> --}}
            <img id="userPhoto"
                class="w-14 h-14 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
                src="{{ asset("images/default/avatar_default.webp")}}" alt="User">

        </div>
        <div class="flex-1 px-4">
            <h2 class="text-xl font-bold text-gray-800">{{ $student->full_name }}</h2>
            <p class="text-gray-600 mt-1">
                R.U: <span class="font-medium">{{ $student->ru }}</span>
            </p>
        </div>

        <!-- BOTÓN DETALLES -->
        <button @click="isOpen{{ $student->id }} = !isOpen{{ $student->id }}"
            class="flex items-center text-gray-700 hover:text-blue-600 transition">
            <span class="mr-1 font-medium">Detalles</span>
            <div class="w-0 h-0 border-l-8 border-r-8 border-transparent 
                                border-t-8 border-t-gray-600 transition-transform"
                :class="isOpen{{ $student->id }} ? 'rotate-180' : ''">
            </div>
        </button>
    </div>

    <!-- PANEL DESPLEGABLE -->
    <div x-show="isOpen{{ $student->id }}" x-transition class="px-5 pb-5 border-t border-gray-200">
        <div class="pt-4">

            <!-- UNA TARJETA -->
            <div class="grid grid-cols-4 gap-6 mb-4">
                <div class="col-span-3 bg-blue-50 p-4 rounded-lg">
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <label class="text-sm font-medium text-gray-700 mr-2">Turno:</label>
                            <div class="flex items-center">
                                <i class="fas fa-clock text-blue-600 mr-2 text-lg"></i>
                                <span class="font-medium text-gray-800">{{ $student->shift->name ?? '' }}</span>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label class="text-sm font-medium text-gray-700 mr-2">Semestre</label>
                            <div class="flex items-center">
                                <i class="fas fa-book text-blue-600 mr-2 text-lg"></i>
                                <span class="font-medium text-gray-800">{{ $student->semester }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-rows-2">
                    <div>
                        <a href="{{ route('show.student', ["idStudent" => $student->id]) }}">
                            <x-ui.btn.info>
                                <i class="fa fa-plus"></i> Info
                            </x-ui.btn.info>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <x-ui.btn.danger>
                                <x-slot:icon>
                                    <i class="fa fa-trash"></i>
                                </x-slot:icon>
                                Eliminar
                            </x-ui.btn.danger>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>