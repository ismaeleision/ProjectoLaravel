<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detalle Evento') }}--{{$evento->nombre}}
      @auth
      @if(Auth::user()->id != $evento->user->id)
      <a href="*">
        <x-button class="ml-3">
          {{ __('Inscribete') }}
        </x-button>
      </a>
      @endif
      @endauth
    </h2>
  </x-slot>

  <div class=" rounded overflow-hidden border w-full  bg-white mx-3 md:mx-0 lg:mx-0">
    <div class="w-full flex justify-between p-3 items-center">
      <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
    </div>
    <div class="h-6/12 w-9/12">
      <img class="w-full bg-cover" src="{{$evento->imagen}}">
    </div>
    <div class="px-3 pb-2 w-fit flex items-center bg-grey-300 border-black-500 mt-4">
      <!--Nombre-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Nombre</span>
          <h3 class="m-5 text-2xl">{{$evento->nombre}}</h3>
        </div>
      </div>

      <!--Descripcion-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Descripcion</span>
          <h3 class="m-5 text-2xl">{{$evento->descripcion}}</h3>
        </div>
      </div>

      <!--Fecha-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Fecha</span>
          <h3 class="m-5 text-2xl">{{$evento->fecha}}</h3>
        </div>
      </div>

      <!--Ciudad-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Ciudad</span>
          <h3 class="m-5 text-2xl">{{$evento->ciudad}}</h3>
        </div>
      </div>

      <!--Direccion-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Direccion</span>
          <h3 class="m-5 text-2xl">{{$evento->direccion}}</h3>
        </div>
      </div>

      <!--Aforo-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Aforo Maximo</span>
          <h3 class="m-5 text-2xl">{{$evento->aforomax}}</h3>
        </div>
      </div>

      <!--Entradas-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Entradas Disponibles</span>
          <h3 class="m-5 text-2xl">{{$evento->nummaxentradas}}</h3>
        </div>
      </div>

      <!--Tipo-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Tipo</span>
          <h3 class="m-5 text-2xl">{{$evento->tipo}}</h3>
        </div>
      </div>

      <!--Categoria-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Categoria</span>
          <h3 class="m-5 text-2xl">{{$evento->categoria->nombre}}</h3>
        </div>
      </div>

      <!--Organizador-->
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">Organizador</span>
          <h3 class="m-5 text-2xl">{{$evento->user->nombre}}</h3>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>