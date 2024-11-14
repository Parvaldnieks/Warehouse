<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-300 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-900">
        <div class="max-w-5xl mx-auto px-4 lg:px-6 space-y-6">
            <!-- Profile Information Section -->
            <div class="p-6 bg-gray-800 shadow-md rounded-lg border border-gray-700">
                <h3 class="text-xl font-semibold text-yellow-400 mb-4">Profile Information</h3>
                <div class="max-w-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-6 bg-gray-800 shadow-md rounded-lg border border-gray-700">
                <h3 class="text-xl font-semibold text-yellow-400 mb-4">Update Password</h3>
                <div class="max-w-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-6 bg-gray-800 shadow-md rounded-lg border border-gray-700">
                <h3 class="text-xl font-semibold text-red-600 mb-4">Delete Account</h3>
                <div class="max-w-lg">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
