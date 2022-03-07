<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Apellidos -->
            <div>
                <x-label for="apellidos" :value="__('Apellidos')" />
                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
            </div>

            <!-- DNI -->
            <div>
                <x-label for="dni" :value="__('DNI')" />
                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
            </div>

            <!-- EDAD -->
            <div>
                <x-label for="edad" :value="__('Edad')" />
                <x-input id="edad" class="block mt-1 w-full" type="number" name="edad" :value="old('edad')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- DIRECCION -->
            <div>
                <x-label for="direccion" :value="__('Direccion')" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />
            </div>

            <!-- CIUDAD -->
            <div>
                <x-label for="ciudad" :value="__('Ciudad')" />
                <x-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus />
            </div>

            <!-- TELEFONO -->
            <div>
                <x-label for="telefono" :value="__('Telefono')" />
                <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required autofocus />
            </div>

            <!-- ROL -->
            <div>
                <x-label for="rol" :value="__('Rol')" />
                <x-label for="rol" :value="__('Admin')" />
                <x-input id="rol1" class="block mt-1w-2" type="radio" name="rol" value="admin" />
                <x-input id="rol2" class="block mt-1w-2" type="radio" name="rol" value="organizador" />Organizador
                <x-input id="rol3" class="block mt-1w-2" type="radio" name="rol" value="usuario" />Usuario
            </div>


            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>