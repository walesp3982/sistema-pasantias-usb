<x-app-layout>
    <x-ui.section>
        <x-ui.title>
            Postulaciones creadas
        </x-ui.title>
    </x-ui.section>

    <x-ui.section>
        @forelse ($createdPostulations as $postulations)
            {{-- Haz la carta de abajo mejor y ponle un grid para que a la derecha existan botones --}}
            <div class=" bg-sky-100 p-4 rounded text-black mt-2 border border-sky-300">
                <div class="flex flex-row gap-4">
                    <div class="flex-1">
                        <p><strong>Empresa:</strong> {{ $postulations->internship->company->name }}</p>
                        <p><strong>Fecha de inicio:</strong> {{ $postulations->internship->start_date->format('d/m/Y') }}
                        </p>
                        <p><strong>Fecha de finalización:</strong>
                            {{ $postulations->internship->end_date->format('d/m/Y') }}</p>
                        <p><strong>Ubicación:</strong> {{ $postulations->internship->location->full_address }}</p>
                        <p class="text-gray-500 text-sm mt-2"><strong>Creado el:</strong>
                            {{ $postulations->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center">
                        <a href="{{ route('postulation.edit', $postulations->id) }}">
                            <x-ui.btn.info>
                                <x-slot:icon>
                                    <i class="fas fa-plus-circle"></i>
                                </x-slot:icon>
                                Agregar Documentos
                            </x-ui.btn.info>
                        </a>

                        <x-ui.btn.danger>
                            <x-slot:icon>
                                <i class="fas fa-trash-alt"></i>
                            </x-slot:icon>
                            Eliminar
                        </x-ui.btn.danger>
                    </div>
                </div>
            </div>
        @empty
            <x-ui.notif.info>
                No se encontró alguna postulation enviadas
                busque alguna <a href="{{ route('search.internship') }}">pasantía</a>
            </x-ui.notif.info>
        @endforelse
    </x-ui.section>

    <x-ui.section>
        <x-ui.title>
            Postulaciones enviadas
        </x-ui.title>
    </x-ui.section>

    <x-ui.section>
        @forelse ($sendPostulations as $postulations)
            <div class=" bg-lime-100 p-4 rounded-lg text-black mt-2 border border-lime-300">
                <div class="flex flex-row gap-4">
                    <div class="flex-1">
                        <p><strong>Empresa:</strong> {{ $postulations->internship->company->name }}</p>
                        <p><strong>Fecha de inicio:</strong> {{ $postulations->internship->start_date->format('d/m/Y') }}
                        </p>
                        <p><strong>Fecha de finalización:</strong>
                            {{ $postulations->internship->end_date->format('d/m/Y') }}</p>
                        <p><strong>Ubicación:</strong> {{ $postulations->internship->location->full_address }}</p>
                        <p class="text-gray-500 text-sm mt-2"><strong>Creado el:</strong>
                            {{ $postulations->created_at->format('d/m/Y') }}</p>
                        <p class="text-gray-500 text-sm mt-2"><strong>Enviado el:</strong>
                            {{ $postulations->updated_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center">
                        <x-ui.btn.info>
                            <x-slot:icon>
                                <i class="fas fa-info"></i>
                            </x-slot:icon>
                            Mostrar Detalles
                        </x-ui.btn.info>
                    </div>
                </div>
            </div>
        @empty
            <x-ui.notif.info>
                No tiene postulaciones mandadas, sube una
            </x-ui.notif.info>
        @endforelse
    </x-ui.section>

</x-app-layout>