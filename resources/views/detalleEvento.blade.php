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

  <div class=" rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 md:mx-0 lg:mx-0">
    <div class="w-full flex justify-between p-3">
      <div class="flex">
        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
          <img src="https://avatars0.githubusercontent.com/u/38799309?v=4" alt="profilepic">
        </div>
        <span class="pt-1 ml-2 font-bold text-sm">braydoncoyer</span>
      </div>
      <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
    </div>
    <img class="w-full bg-cover" src="https://3.bp.blogspot.com/-Chu20FDi9Ek/WoOD-ehQ29I/AAAAAAAAK7U/mc4CAiTYOY8VzOFzBKdR52aLRiyjqu0MwCLcBGAs/s1600/DSC04596%2B%25282%2529.JPG">
    <div class="px-3 pb-2">
      <div class="pt-2">
        <i class="far fa-heart cursor-pointer"></i>
        <span class="text-sm text-gray-400 font-medium">12 likes</span>
      </div>
      <div class="pt-1">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">braydoncoyer</span> Lord of the Rings is my favorite film-series. One day I'll make my way to New Zealand to visit the Hobbiton set!
        </div>
      </div>
      <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>
      <div class="mb-2">
        <div class="mb-2 text-sm">
          <span class="font-medium mr-2">razzle_dazzle</span> Dude! How cool! I went to New Zealand last summer and had a blast taking the tour! So much to see! Make sure you bring a good camera when you go!
        </div>
      </div>
    </div>
  </div>

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