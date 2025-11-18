<div>
    {{ $companies->links() }}
    <div class="mt-4"></div>
    <x-ui.section>
        @foreach ($companies as $company)
            <p>{{ $company->name }}: {{ $company->sector->name }}</p>
            <a href="{{ route("create.intership",
            [
                'companyId' => $company->id]) }}">
                <button type="button">
                    Crear pasantía
                </button>
            </a>
        @endforeach

    </x-ui.section>


    {{-- Be like water. --}}
</div>
