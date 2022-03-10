<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Inscripciones') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 m-5">
          <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
              <tr class="border border-green-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Usuario</th>
                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Evento</th>
                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Entradas</th>
                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Estado</th>
                <th class="bg-green-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
              </tr>
            </thead>
            <tbody class="block md:table-row-group">
              @foreach($inscripciones as $inscripcion)
              <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$inscripcion->user->nombre}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$inscripcion->evento->nombre}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$inscripcion->numentradas}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$inscripcion->estado}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                  <a href="/inscripciones/edit/{{ $inscripcion->id }}" data-method='edit'><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-white-500 rounded">Editar</button></a>
                  <a href="/inscripciones/delete/{{ $inscripcion->id }}" data-method='delete'><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-white-500 rounded">Borrar</button></a>
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