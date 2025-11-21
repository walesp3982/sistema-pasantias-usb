<div class=" bg-white p-4">
    <!-- Checkbox oculto -->
    <input type="checkbox" id="empresa{{ $company->id }}" class="hidden peer" />

    <!-- ENCABEZADO -->
    <label for="empresa{{ $company->id }}" class="flex items-center justify-between cursor-pointer">
        <!--logo empresa -->
        <div class="flex items-center space-x-3">
            <img class="w-12 h-12 rounded-full" src="{{asset("images/default/avatar_default.webp")}}" alt="logo" />
            <!--nombre de la empresa-->
            <span class="font-semibold text-lg">{{$company->name}}</span>
        </div>

        <!--Icono de la flecha-->
        <div class="triangle"></div>
    </label>

    <!--linea que divide el contenido-->
    <div class="border-t my-3"></div>

    <!--contenido oculto-->
    <div class="hidden peer-checked:block space-y-2">
        <div class="grid grid-cols-5">
            <div class="col-span-4">
                <p>
                    <span class="font-semibold">Sector: </span>
                    {{ $company->sector->name }}
                </p>
                <p>
                    <span class="font-semibold">Número de pasantías: </span>{{ $company->interships->count() }}
                </p>
                {{-- <p>
                    <span class="font-semibold">Cantidad de pasantes:</span>12
                </p> --}}
            </div>
            <div class="col-span-1">
                <a href="{{ route("create.intership", ['companyId' => $company->id]) }}">
                    <button class="mt-3 px-4 py-2 border border-gray-700 rounded hover:bg-gray-200">
                        Crear pasantía
                    </button>
                </a>
                <a href="">
                    <button class="mt-3 px-4 py-2 border border-gray-700 rounded hover:bg-gray-200">
                        Más info
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
