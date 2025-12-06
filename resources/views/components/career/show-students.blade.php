<div>
    <x-ui.section>
        <div class="flex flex-row justify-between items-stretch gap-2">
            <div class="flex-1">
                <x-ui.title>
                    Lista de estudiantes
                </x-ui.title>
            </div>

            <div>
                <a href="{{ route('students.eliminate') }}">
                    <x-ui.btn.info>
                    <x-slot:icon>
                        <i class="fa-solid fa-circle-user"></i>
                    </x-slot:icon>
                    Estudiantes eliminados
                </x-ui.btn.info>
                </a>
                
            </div>

        </div>

    </x-ui.section>
    <livewire:career.paginate-students :career_id="$career_id" />
</div>