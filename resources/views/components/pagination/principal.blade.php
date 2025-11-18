@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between mt-4">

        {{-- Información de página --}}
        <div class="text-sm text-gray-600">
            Mostrando
            <span class="font-semibold">{{ $paginator->firstItem() }}</span>
            al
            <span class="font-semibold">{{ $paginator->lastItem() }}</span>
            de
            <span class="font-semibold">{{ $paginator->total() }}</span>
            resultados
        </div>

        {{-- Navegación --}}
        <ul class="inline-flex items-center select-none rounded-lg overflow-hidden border border-gray-300">

            {{-- Botón Anterior --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-1.5 bg-gray-200 text-gray-400 text-sm cursor-not-allowed">
                        ← Anterior
                    </span>
                </li>
            @else
                <li>
                    <button wire:click="previousPage"
                            class="px-3 py-1.5 bg-white text-gray-700 hover:bg-gray-100 text-sm">
                        ← Anterior
                    </button>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-1 text-gray-500 bg-white border-l border-gray-300">...</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-1.5 bg-blue-600 text-white text-sm font-semibold border-l border-gray-300">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <button wire:click="gotoPage({{ $page }})"
                                        class="px-3 py-1.5 bg-white text-gray-700 hover:bg-gray-100 text-sm border-l border-gray-300">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botón Siguiente --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage"
                            class="px-3 py-1.5 bg-white text-gray-700 hover:bg-gray-100 text-sm border-l border-gray-300">
                        Siguiente →
                    </button>
                </li>
            @else
                <li>
                    <span class="px-3 py-1.5 bg-gray-200 text-gray-400 text-sm cursor-not-allowed border-l border-gray-300">
                        Siguiente →
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
