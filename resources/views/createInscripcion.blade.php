<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Entradas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <form method="POST" action="{{ route('inscripciones.store') }}" enctype="multipart/form-data">
            @csrf

            <!--El usuario se lo pasamos en el controlador-->

            <!-- Evento -->
            <x-input id="evento" class="block mt-1 w-full" type="hidden" name="evento" value="{{$id}}" required autofocus />

            <!-- NumEntradas -->
            <div>
              <x-label for="numentradas" :value="__('Numero De Entradas')" />
              <x-input id="numentradas" class="block mt-1 w-full" type="number" name="numentradas" :value="old('numentradas')" required autofocus />
            </div>

            <!-- Estado es siempre en proceso-->

            <x-button class="ml-4 mt-2">
              {{ __('Pedir Entradas') }}
            </x-button>
        </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>