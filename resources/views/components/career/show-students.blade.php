<div>
    <x-ui.section>
        <div class="flex flex-row">
            <x-ui.title class="flex-row">
                Lista de estudiantes
            </x-ui.title>
            <x-ui.btn.info>
                <x-slot:icon>
                    <i class="fa-solid fa-circle-user"></i>
                </x-slot:icon>
                Estudiantes eliminados
            </x-ui.btn.info>
        </div>

    </x-ui.section>
    <livewire:career.paginate-students :career_id="$career_id" />
</div>