<x-guest-layout>
    <div class="bg-gray-900 p-8 max-w-md mx-auto rounded-md shadow-lg text-gray-300">
        <h2 class="text-center text-3xl font-extrabold text-yellow-400 mb-6">Warehouse Registration</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-yellow-300 font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-yellow-300 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-yellow-300 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-yellow-300 font-semibold" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-yellow-500" />
            </div>

            <!-- Register Button and Login Link -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-yellow-300 hover:text-yellow-400 underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 px-4 py-2 rounded-md font-semibold ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
