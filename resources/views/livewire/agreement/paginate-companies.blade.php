<div>
    {{ $companies->links() }}
    <div class="mt-4"></div>
    <x-ui.section>
        @foreach ($companies as $company)
            <x-agreemtent.company-block :company="$company">

            </x-agreemtent.company-block>
        @endforeach

    </x-ui.section>


    {{-- Be like water. --}}
</div>
