<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editando Evento') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <form method="POST" action="/inscripciones/{{ $inscripcion->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
              <x-label for="nombre" :value="__('Nombre')" />
              <x-input class="block mt-1 w-full" type="text" disabled :value="old('nombre')" value="{{$inscripcion->user->nombre}}" required autofocus />
              <x-input type="hidden" id="user_id" value="{{$inscripcion->user->id}}" />
            </div>

            <!-- Evento -->
            <div>
              <x-label for="evento" :value="__('Evento')" />
              <x-input class="block mt-1 w-full" type="text" disabled :value="old('evento')" value="{{$inscripcion->evento->nombre}}" required autofocus />
              <x-input type="hidden" id="evento" value="{{$inscripcion->evento->id}}" />
            </div>

            <!-- NumEntradas -->
            <div>
              <x-label for="numentradas" :value="__('Numero de Entradas')" />
              <x-input id="numentradas" class="block mt-1 w-full" type="number" name="numentradas" :value="old('numentradas')" value="{{$inscripcion->numentradas}}" required autofocus />
            </div>

            <!-- Estado  Proceso/Autorizado/Denegado-->
            @if (Auth::user()->id == $inscripcion->user->id)
            <div>
              <x-label for="estado" :value="__('Estado')" />
              <select name="estado" disabled id="estado" class="w-1/2">
                <option value="En Proceso" selected>En Proceso</option>
              </select>
            </div>
            @else
            <div>
              <x-label for="estado" :value="__('Estado')" />
              <select name="estado" id="estado" class="w-1/2">
                <option value="En Proceso" selected>En Proceso</option>
                <option value="autorizado">Autorizado</option>
                <option value="denegado">Denegado</option>
              </select>
            </div>
            @endif

            <x-button class="ml-4 mt-2">
              {{ __('Actualizar Evento') }}
            </x-button>
        </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>