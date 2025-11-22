<div>
    <div class="mb-6">
        {{ $students->links() }}
    </div>
    

    <x-ui.section>

        @foreach ($students as $student)
            {{-- <p>{{ $student->full_name }}: {{ $student->career->name }}</p> --}}
            <x-career.student-block :student="$student"></x-career.student-block>

        @endforeach

    </x-ui.section>
    {{-- Be like water. --}}
</div>