<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Warehouse Dashboard') }}</h2>
    </x-slot>

    <div class="dashboard-content">
        <div class="bg-white shadow-md rounded-lg p-6 text-gray-700 text-center">
            <p class="text-lg font-semibold">{{ __("You're logged in!") }}</p>
            <p class="mt-2 text-gray-500">Explore the options below to manage inventory and orders.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <div class="bg-gray-100 p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-gray-800">Inventory</h3>
                <p class="text-gray-600">Manage and track current stock levels.</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-gray-800">Orders</h3>
                <p class="text-gray-600">View and process recent warehouse orders.</p>
            </div>
        </div>
    </div>
</x-app-layout>
