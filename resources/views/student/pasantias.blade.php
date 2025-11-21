<x-app-layout>

    @session('error')
        <x-ui.notif.error>
            {{ session('error') }}
        </x-ui.notif.error>
    @endsession

    <h1 class="text-3xl font-bold text-center text-blue-600 my-8">
        <i class="fas fa-briefcase mr-2"></i>Pasantías Disponibles
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-6">

        @foreach ($interships as $intership)
            <x-student.postulation :intership="$intership"></x-student.postulation>
        @endforeach
        {{-- <x-card.postulation></x-card.postulation>
        <x-card.postulation></x-card.postulation>
        <x-card.postulation></x-card.postulation> --}}

    </div>

</x-app-layout>
