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
        <div class="flex flex-row justify-between items-stretch gap-2">
            <div class="flex-1 bg-blue-50 p-4 rounded-lg ">
                <p>
                    <span class="font-semibold">Sector: </span>
                    {{ $company->sector->name }}
                </p>
                <p>
                    <span class="font-semibold">Número de pasantías: </span>{{ $company->interships->count() }}
                </p>
            </div>
            <div class="">
                <div class="grid grid-rows-2 gap-2">
                    <div>
                        <a href="{{ route("create.intership", ['companyId' => $company->id]) }}">
                            <x-ui.btn.info>
                                <x-slot:icon>
                                    <i class="fa fa-plus"></i>
                                </x-slot:icon>
                                Agregar Pasantía
                            </x-ui.btn.info>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <x-ui.btn.info>
                                <x-slot:icon>
                                    <i class="fa-solid fa-info"></i>
                                </x-slot:icon>
                                Más Info
                            </x-ui.btn.info>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>