<x-guest-layout>
    <!-- Warehouse-style Login -->
    <div class="bg-gray-100 p-8 max-w-md mx-auto rounded-md shadow-lg">
        <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Warehouse Login</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" class="h-4 w-4 text-gray-700 focus:ring-gray-600 border-gray-300 rounded" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">{{ __('Remember me') }}</label>
            </div>

            <!-- Login Button and Password Link -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-500 hover:text-gray-700 underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-primary-button class="bg-gray-700 text-white hover:bg-gray-800 px-4 py-2 rounded-md font-semibold ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
