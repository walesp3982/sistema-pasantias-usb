<div>
    <x-ui.section>
        @foreach ($companies as $company)
            <p>{{ $company->name }}: {{ $company->sector->name }}</p>
        @endforeach
 
    </x-ui.section>
    {{ $companies->links('components.pagination.principal') }}

    {{-- Be like water. --}}
</div>
