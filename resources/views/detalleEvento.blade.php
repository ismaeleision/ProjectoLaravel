<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detalle Evento') }}--{{$evento->nombre}}
      @auth
      <a href="*">
        <x-button class="ml-3">
          {{ __('Inscribete') }}
        </x-button>
      </a>
      @endauth
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 text-4xl m-5">
          <div class="border border-black-500 w-fit flex items-center">
            <img src="{{$evento->imagen}}" class="w-4/12">
            <h3 class="m-5 text-2xl">{{$evento->nombre}}</h3>
            <h4 class="m-4 text-xl">{{$evento->categoria->nombre}}</h4>
            <p class="ml-3">{{$evento->descripcion}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>