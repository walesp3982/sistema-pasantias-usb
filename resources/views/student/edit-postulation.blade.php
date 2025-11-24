<x-app-layout>
    <x-ui.section>
        <div class="flex flex-row gap-4 items-center justify-between">
            <div class="flex-1">
                <x-ui.title>
                    Postulación
                </x-ui.title>
            </div>

            <div>
                <x-ui.btn.info :disabled="$enable">
                    <x-slot:icon>
                        <i class="fa-solid fa-paper-plane"></i>
                    </x-slot:icon>
                    Enviar postulacion
                </x-ui.btn.info>
            </div>

        </div>

        <div class=" bg-sky-100 p-4 rounded text-black mt-5 border border-sky-300 ">
            <div class="">
                <div class="">
                    <p><strong>Empresa:</strong> {{ $postulation->internship->company->name }}</p>
                    <p><strong>Fecha de inicio:</strong> {{ $postulation->internship->start_date->format('d/m/Y') }}
                    </p>
                    <p><strong>Fecha de finalización:</strong>
                        {{ $postulation->internship->end_date->format('d/m/Y') }}</p>
                    <p><strong>Ubicación:</strong> {{ $postulation->internship->location->full_address }}</p>
                    <p class="text-gray-500 text-sm mt-2"><strong>Creado el:</strong>
                        {{ $postulation->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </x-ui.section>

    <x-ui.section>
        <x-ui.title>
            Documentos a entregar
        </x-ui.title>
        <table class="w-full mt-4 border-collapse border">
            <thead>
                <tr>
                    <th class="text-left p-2">Documento</th>
                    <th class="text-left p-2">Estado</th>
                    <th class="text-left p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $key => $document)
                    <tr class="border-t">
                        <td class="p-2">{{ $document["type"]->getFullName()->name }}</td>
                        <td class="p-2">
                            @if (!is_null($document["data"]))
                                <span class="text-green-600 font-semibold">Entregado</span>
                            @else
                                <span class="text-red-600 font-semibold">Pendiente</span>
                            @endif
                        </td>
                        <td class="p-2">
                            <!-- Aquí puedes agregar botones o enlaces para acciones relacionadas con el documento -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-ui.section>

    <x-ui.section>
        <x-ui.title>
            Subir Documentos
        </x-ui.title>
        <form action="{{ route('student.postulation.upload-documents', $postulation->id) }}" method="POST"
            enctype="multipart/form-data" class="mt-4">
            @csrf
            <x-form.select id="typeDoc" name="typeDoc">
                @foreach ($select as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </x-form.select>
            <div class="my-5">
                <input type="file" name="document" id="document" class="w-full border rounded p-2" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Subir
                    Documento</button>
            </div>
        </form>
    </x-ui.section>
</x-app-layout>