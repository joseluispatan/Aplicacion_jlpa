<x-admin-layout>

    <form action="{{ route('admin.predios.update', $predio->id) }}"
        method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
       
        <form class="max-w-sm mx-auto">
            
            <p class="text-1,5xl font-extrabold text-gray-900 dark:text-white", style="text-align: center;">DATOS DEL INMUEBLE</p>
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"></ul>
            <! -- FILA 1 DE DATOS DEL INMUEBLE --> 
            <div class="grid items-end gap-6 md:grid-cols-5">
                <div class="mb-5">
                    <x-label>ZONA HOMOGENEA:</x-label>
                    <x-select class="w-full" name="zh_id">
                        @foreach ($zhs as $zh)
                            <option @selected(old('zh_id', $predio->zh_id) == $zh->id) value="{{ $zh->id }}">
                                {{ $zh->zh }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-5">
                    <x-label>URBANIZACIÓN:</x-label>
                    <x-input name="urbanizaci" value="{{ $predio->urbanizaci }}" />
                
                </div>
                <div class="mb-5">
                    <x-label>DISTRITO</x-label>
                    <x-select class="w-full" name="distrito_id">
                        @foreach ($distritos as $distrito)
                            <option @selected(old('distrito_id', $predio->distrito_id) == $distrito->id) value="{{ $distrito->id }}">
                                {{ $distrito->codigo_dis }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-5">
                    <x-label>MANZANA</x-label>
                    <x-select class="w-full" name="manzana_id">
                        @foreach ($manzanas as $manzana)
                            <option @selected(old('manzana_id', $predio->manzana_id) == $manzana->id) value="{{ $manzana->id }}">
                                {{ $manzana->codigo_man }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-5">
                    <x-label>NÚMERO DEL PREDIO:</x-label>
                    
                    <x-input name="numero" value="{{ $predio->numero}}"/>
                </div>
            </div> 
            <! -- FILA 1 DE DATOS DEL INMUEBLE --> 
            <div class="grid items-end gap-6 md:grid-cols-5">
                <div class="mb-5">
                    <x-label>NOMBRE DE LA VÍA</x-label>
                    <x-select class="w-full" name="via_id">
                        @foreach ($vias as $via)
                            <option @selected(old('via_id', $predio->via_id) == $via->id) value="{{ $via->id }}">
                                {{ $via->nombre }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </div> 

            <div style="text-align: center;">
                <x-button class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" >
                    Guardar Cambios
                </x-button>
            </div>
        </form>
</x-admin-layout>