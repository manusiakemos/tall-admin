<x-guest-layout>
    <x-auth.auth-card
        class="backdrop-filter backdrop-blur-xl backdrop-sepia-0 bg-white/70
                        flex flex-col w-full mx-12 px-12 py-6 rounded-tl-3xl rounded-br-3xl">
        <x-slot name="logo">
            LOGIN
        </x-slot>

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-auth.label for="username" :value="__('Username')"></x-auth.label>

                <x-auth.input id="username" class="block mt-1 w-full" type="text" name="username"
                              :value="old('username')" required autofocus></x-auth.input>
                @error("username")
                <div class="text-danger-500 font-normal text-sm py-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-auth.label for="password" :value="__('Password')"></x-auth.label>

                <x-auth.input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password"></x-auth.input>
                @error("password")
                <div class="text-danger-500 font-normal text-sm py-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-secondary-600 shadow-sm focus:border-secondary-300 focus:ring focus:ring-secondary-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-auth.button class="ml-3">
                    {{ __('Log in') }}
                </x-auth.button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
