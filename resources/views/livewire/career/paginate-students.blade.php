<div>
    <x-ui.section>
        @foreach ($students as $student)
            <p>{{ $student->full_name }}: {{ $student->career->name }}</p>
        @endforeach
 
    </x-ui.section>
    {{ $students->links('components.pagination.principal') }}

    {{-- Be like water. --}}
</div>
