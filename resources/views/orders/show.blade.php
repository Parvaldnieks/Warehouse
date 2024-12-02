<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md text-gray-300 border-4 border-yellow-400">
        <h1 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Order Details</h1>

        <!-- Display Order Information -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-yellow-400">Order #{{ $order->id }}</h2>
            <p class="text-lg text-gray-300">Status: <span class="text-yellow-300">{{ ucfirst($order->status) }}</span></p>
            <p class="text-lg text-gray-300">Total Price: <span class="text-yellow-300">${{ number_format($order->total_price, 2) }}</span></p>
            <p class="text-lg text-gray-300">Placed on: {{ $order->created_at->format('M d, Y') }}</p>
        </div>

        <!-- Display Order Items -->
        <h3 class="text-lg font-semibold text-yellow-400 mb-4">Order Items</h3>
        <table class="min-w-full bg-gray-700 rounded-md">
            <thead>
                <tr class="text-left">
                    <th class="px-4 py-2 text-gray-300">Product Name</th>
                    <th class="px-4 py-2 text-gray-300">Quantity</th>
                    <th class="px-4 py-2 text-gray-300">Price</th>
                    <th class="px-4 py-2 text-gray-300">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td class="px-4 py-2 text-gray-300">{{ $orderItem->item->name }}</td>
                        <td class="px-4 py-2 text-gray-300">{{ $orderItem->quantity }}</td>
                        <td class="px-4 py-2 text-gray-300">${{ number_format($orderItem->price, 2) }}</td>
                        <td class="px-4 py-2 text-gray-300">${{ number_format($orderItem->quantity * $orderItem->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Optional: Address and Payment Information -->
        <div class="mt-6">
            <p class="text-gray-300">{{ $order->address}}</p>
            <p class="text-gray-300">{{ $order->payment_method}}</p>
        </div>

        <div class="mt-6 flex justify-end">
            @if ($order->status !== 'canceled')  <!-- Make sure only non-canceled orders can be deleted -->
                <form action="{{ route('orders.destroy', $order) }}" method="POST">
                    @csrf
                    @method('DELETE') <!-- Using DELETE for removing the order -->
                    <button type="submit" class="bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 px-6 py-2 shadow-md">
                        Cancel Order
                    </button>
                </form>
            @else
                <p class="text-red-500 font-semibold">This order is already canceled and cannot be deleted.</p>
            @endif
        </div>
    </div>

    <!-- Display Success or Error Messages -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
            {{ session('error') }}
        </div>
    @endif
</x-app-layout>
