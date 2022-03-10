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
          <form method="POST" action="/eventos/{{ $evento->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
              <x-label for="nombre" :value="__('Nombre')" />
              <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" value="{{$evento->nombre}}" required autofocus />
            </div>

            <!-- Fecha -->
            <div>
              <x-label for="fecha" :value="__('Fecha')" />
              <x-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" value="{{$evento->fecha}}" required autofocus />
            </div>

            <!-- Descripcion -->
            <div>
              <x-label for="descripcion" :value="__('Descripcion')" />
              <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" value="{{$evento->descripcion}}" required autofocus />
            </div>

            <!-- Ciudad -->
            <div>
              <x-label for="ciudad" :value="__('Ciudad')" />
              <x-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" value="{{$evento->ciudad}}" required autofocus />
            </div>

            <!-- Direccion -->
            <div>
              <x-label for="direccion" :value="__('Direccion')" />
              <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" value="{{$evento->direccion}}" required autofocus />
            </div>

            <!-- AForoMax -->
            <div>
              <x-label for="aforomax" :value="__('Aforo Maximo')" />
              <x-input id="aforomax" class="block mt-1 w-full" type="number" name="aforomax" :value="old('aforomax')" value="{{$evento->aforomax}}" required autofocus />
            </div>

            <!-- Tipo  Online/Presencial-->
            <div>
              <x-label for="tipo" :value="__('Tipo')" />
              <select name="tipo" id="tipo" class="w-1/2">
                <option value="online">Online</option>
                <option value="presencial" selected>Presencial</option>
              </select>
            </div>

            <!-- NumMaxEntradas -->
            <div>
              <x-label for="nummaxentradas" :value="__('Numero Maximo de Entradas')" />
              <x-input id="nummaxentradas" class="block mt-1 w-full" type="text" name="nummaxentradas" :value="old('nummaxentradas')" value="{{$evento->nummaxentradas}}" required autofocus />
            </div>

            <!-- Categoria -->
            <div>
              <x-label for="categoria" :value="__('Categoria')" />
              <select name="categoria" id="categoria" class="w-full">
                @foreach($categorias as $categoria)
                @if($categoria->id == $evento->categoria->id)
                <option value=" {{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                @else
                <option value=" {{$categoria->id}}">{{$categoria->nombre}}</option>
                @endif
                @endforeach
              </select>
            </div>

            <x-button class="ml-4 mt-2">
              {{ __('Actualizar Evento') }}
            </x-button>
        </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>