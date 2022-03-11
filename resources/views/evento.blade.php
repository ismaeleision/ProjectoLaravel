<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evento') }}

            @auth
            @unless (Auth::user()->rol == 'usuario')
            <a href="/eventos/create">
                <x-button class="ml-3">
                    {{ __('Nuevo Evento') }}
                </x-button>
            </a>
            @endif
            @endauth
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 m-5">
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-green-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell"></th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Fecha</th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Ciudad</th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Organizador</th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Categoria</th>
                                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach($eventos as $evento)

                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">

                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><img src="{{$evento->imagen}}"></td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$evento->nombre}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$evento->fecha}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$evento->ciudad}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$evento->user->nombre}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$evento->categoria->nombre}}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <a href="/eventos/{{$evento->id}}" data-method='show'><button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 border border-white-500 rounded">Detalles</button> </a>
                                    @auth
                                    @unless(Auth::user()->role=='usuario' || $evento->user->id !=Auth::user()->id )
                                    <a href="/eventos/{{ $evento->id }}/edit" data-method='edit'><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-white-500 rounded">Editar</button></a>
                                    <a href="/eventos/delete/{{$evento->id}}" data-method='destroy'><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-white-500 rounded">Eliminar</button></a>
                                    @endif
                                    @endauth
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>