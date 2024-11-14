<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Warehouse Dashboard') }}</h2>
    </x-slot>

    <div class="dashboard-content">
        <!-- Welcome Message -->
        <div class="bg-gray-900 text-gray-300 shadow-md rounded-lg p-6 text-center">
            <p class="text-lg font-semibold text-yellow-400">{{ __("You're logged in!") }}</p>
            <p class="mt-2 text-gray-500">Explore the options below to manage inventory and orders.</p>
        </div>

        <!-- Options Row (Items in a Straight Line) -->
        <div class="grid grid-cols-3 gap-6 mt-6">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-yellow-400">Total Products</h3>
                <p class="text-gray-300">Manage and track current stock levels.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-yellow-400">Recent Orders</h3>
                <p class="text-gray-300">View and process recent warehouse orders.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-yellow-400">Low Stock Items</h3>
                <p class="text-gray-300">View and process recent warehouse orders.</p>
            </div>
        </div>
    </div>
</x-app-layout>
