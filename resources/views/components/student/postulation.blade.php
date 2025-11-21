<div class="card bg-white rounded-xl shadow p-6 flex flex-col justify-between">
    <div>
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-xl font-semibold text-blue-700">
                <i class="fas fa-building mr-2"></i><span>{{ $intership->company->name }}</span>
            </h2>
            <span class="text-sm px-3 py-1 bg-blue-100 text-blue-700 rounded-full">
                <i class="fas fa-calendar-alt mr-1"></i>Hasta:
                <span>{{ $intership->postulation_limit_date->format('d M Y') }}</span>
            </span>
        </div>

        <p class="text-gray-600 text-sm mb-3"> {{ $intership->location->full_address }} </p>

        <div class="text-sm text-gray-500">
            <p><strong class="text-blue-700"><i class="fas fa-play mr-1"></i>Inicio:</strong>
                <span>{{ $intership->start_date->format('d M Y') }}</span>
            </p>
            <p><strong class="text-blue-700"><i class="fas fa-flag-checkered mr-1"></i>Finaliza:</strong>
                <span>{{ $intership->end_date->format('d M Y') }}</span>
            </p>
        </div>
        <div class="text-sm text-gray-500">
            <p><strong class="text-blue-700"><i class="fas fa-play mr-1"></i>Hora:</strong>
                <span>{{ $intership->entry_time->format('H:i') }} - {{ $intership->exit_time->format('H:i') }} </span>
        </div>
    </div>

    <div class="flex justify-between mt-5">
        <form method="POST" action="{{ route('student.postulate', ['idIntership' => $intership->id]) }}">
            @csrf
            <button
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center text-sm">
                <i class="fas fa-paper-plane mr-2"></i>Postularse
            </button>
        </form>

        <button
            class="bg-gray-100 text-blue-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition flex items-center text-sm">
            <i class="fas fa-info-circle mr-2"></i>Más Información
        </button>
    </div>
</div>