<x-guest-layout>
    <div class="bg-gray-900 p-8 max-w-md mx-auto rounded-md shadow-lg text-gray-900">
        <div class="mb-4 text-sm text-gray-300">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-yellow-300 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border border-yellow-500 p-2 rounded-md text-gray-900" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-500" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 px-4 py-2 rounded-md font-semibold">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
