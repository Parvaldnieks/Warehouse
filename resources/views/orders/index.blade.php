<!-- resources/views/orders/index.blade.php -->
<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md text-gray-300 border-4 border-yellow-400">
        <h1 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Orders</h1>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Orders -->
        <div class="space-y-4">
            @foreach ($orders as $order)
                <div class="bg-gray-700 p-4 rounded-md">
                    <h2 class="text-xl font-semibold text-yellow-400">Order #{{ $order->id }}</h2>
                    <p class="text-gray-300">Status: {{ ucfirst($order->status) }}</p>
                    <p class="text-gray-300">Total Price: ${{ number_format($order->total_price, 2) }}</p>
                    <a href="{{ route('orders.show', $order) }}" class="text-yellow-400 hover:underline">View Details</a>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
