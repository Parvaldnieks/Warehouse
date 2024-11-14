<x-guest-layout>
    <div class="bg-gray-900 p-8 max-w-md mx-auto rounded-md shadow-lg text-gray-300">
        <h2 class="text-center text-3xl font-extrabold text-yellow-400 mb-6">Warehouse Login</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-yellow-300 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-yellow-300 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400 border-yellow-500 rounded" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-yellow-300">{{ __('Remember me') }}</label>
            </div>

            <!-- Login Button and Password Link -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-yellow-300 hover:text-yellow-400 underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-primary-button class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 px-4 py-2 rounded-md font-semibold ml-4">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
