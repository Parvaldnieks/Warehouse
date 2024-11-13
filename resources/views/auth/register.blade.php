<x-guest-layout>
    <div class="bg-gray-100 p-8 max-w-md mx-auto rounded-md shadow-lg">
        <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Warehouse Registration</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 p-2 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button and Login Link -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-500 hover:text-gray-700 underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="bg-gray-700 text-white hover:bg-gray-800 px-4 py-2 rounded-md font-semibold ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
