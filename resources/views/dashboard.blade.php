<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Warehouse Dashboard') }}</h2>
    </x-slot>

    <div class="dashboard-content">
        <!-- Welcome Message -->
        <div class="bg-gray-900 text-gray-300 shadow-md rounded-lg p-6 text-center mb-8">
            <p class="text-lg font-semibold text-yellow-400">{{ __("You're logged in!") }}</p>
            <p class="mt-2 text-gray-500">Explore the options below to manage inventory and orders.</p>
        </div>

        <!-- Options Row (Items in a Straight Line) -->
        <div class="grid grid-cols-3 gap-6 mt-6">
            <!-- Total Products Box -->
            <div class="bg-gradient-to-r from-yellow-600 to-yellow-500 p-6 rounded-lg shadow-2xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white">Total Products</h3>
                <p class="text-gray-100">Manage and track current stock levels.</p>
                <p class="mt-4 text-4xl font-bold text-white">{{ $totalItems }}</p> <!-- Display total products -->
            </div>
            
            <!-- Recent Orders Box -->
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-500 p-6 rounded-lg shadow-2xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white">Recent Orders</h3>
                <p class="text-gray-100">View and process recent warehouse orders.</p>
            </div>
            
            <!-- Low Stock Items Box -->
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-6 rounded-lg shadow-2xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white">Low Stock Items</h3>
                <p class="text-gray-100">View and process low stock items.</p>
                <!-- Display the low stock count -->
                <p class="text-3xl font-bold text-white mt-4">{{ $lowStockItemsCount }}</p>
            </div>
        </div>  
    </div>
</x-app-layout>
