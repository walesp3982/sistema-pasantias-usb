<x-app-layout>
    <section>
        <x-ui.section>
            <div class="flex justify-between">
                <x-ui.title>
                    Empresas
                </x-ui.title>
                <a href="{{ route('create.company') }}">
                    <x-ui.btn.info>
                        <x-slot:icon>
                            <i class="fa-solid fa-plus"></i>
                        </x-slot:icon>
                        Agregar nueva empresa
                    </x-ui.btn.info>
                </a>

            </div>

        </x-ui.section>
    </section>

    <livewire:agreement.paginate-companies></livewire:agreement.paginate-companies>

</x-app-layout>