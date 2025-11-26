<x-app-layout>
    <x-ui.section>
        <div class="flex flex-row justify-between items-stretch gap-2">
            <div class="flex-1">
                <x-ui.title>
                    Lista de estudiantes
                </x-ui.title>
            </div>

            <div>
                <a href="{{ route('career.students') }}">
                    <x-ui.btn.info>
                        <x-slot:icon>
                            <i class="fa-solid fa-circle-user"></i>
                        </x-slot:icon>
                        Estudiantes activos
                    </x-ui.btn.info>
                </a>

            </div>
        </div>
    </x-ui.section>

    <x-ui.section>
        @foreach ($students as $student)
            <x-career.student-delete-block 
                :student="$student">

            </x-career.student-delete-block>
        @endforeach
        @empty($student)
            <x-ui.notif.info>
                No existe ningún estudiante eliminado
            </x-ui.notif.info>
        @endempty
        </x-ui.section>
</x-app-layout>