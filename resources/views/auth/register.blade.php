<x-guest-layout>
    <x-auth-card>
        <h1 class="text-3xl items-center">
            Estafias Comesta S.A.
        </h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-3xl" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Nombre -->
            <div class="mt-2">
                <x-label for="nombre" :value="__('Nombre')" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <!-- Apellidos -->
            <div class="mt-2">
                <x-label for="apellidos" :value="__('Apellidos')" />
                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
            </div>

            <!-- DNI -->
            <div class="mt-2">
                <x-label for="dni" :value="__('DNI')" />
                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
            </div>

            <!-- EDAD -->
            <div class="mt-2">
                <x-label for="edad" :value="__('Edad')" />
                <x-input id="edad" class="block mt-1 w-full" type="number" name="edad" :value="old('edad')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- DIRECCION -->
            <div class="mt-2">
                <x-label for="direccion" :value="__('Direccion')" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />
            </div>

            <!-- CIUDAD -->
            <div class="mt-2">
                <x-label for="ciudad" :value="__('Ciudad')" />
                <x-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus />
            </div>

            <!-- TELEFONO -->
            <div class="mt-2">
                <x-label for="telefono" :value="__('Telefono')" />
                <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required autofocus />
            </div>

            <!-- ROL -->
            <div class="mt-2">
                <x-label for="rol" :value="__('Rol')" />
                <div class="w-fit flex items-center">
                    <x-input id="rol" class="block mt-1w-2" type="radio" name="rol" value="admin" />
                    <x-label for="admin" :value="__('Admin')" />
                    <div class="m-4"></div>
                    <x-input id="rol" class="block mt-1w-2" type="radio" name="rol" value="organizador" />
                    <x-label for="organizador" :value="__('Organizador')" />
                    <div class="m-4"></div>
                    <x-input id="rol" class="block mt-1w-2" type="radio" name="rol" value="usuario" />
                    <x-label for="usuario" :value="__('Usuario')" />
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