<x-app-layout>
    <section>
        <x-ui.section>
            <div class="flex justify-between">
                <x-ui.title>
                    Empresas
                </x-ui.title>
                <a href="{{ route('create.company') }}">
                    <x-ui.btn.primary>
                        <i class="fa-solid fa-plus"></i> Empresa
                    </x-ui.btn.primary>
                </a>
                
            </div>

        </x-ui.section>
    </section>

    <livewire:agreement.paginate-companies></livewire:agreement.paginate-companies>

</x-app-layout>