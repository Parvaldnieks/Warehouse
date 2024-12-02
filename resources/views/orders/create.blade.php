<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md text-gray-300 border-4 border-yellow-400">
        <h1 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Place Your Order</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product Details Section -->
        <div class="flex flex-wrap items-center mb-6">
            
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-yellow-400">{{ $item->name }}</h2>
                <p class="text-lg text-gray-300">Price: <span class="text-yellow-300 font-semibold">${{ $item->price }}</span></p>
                <p class="text-sm text-gray-500">Stock: 
                    @if ($item->quantity > 0)
                        <span class="text-green-400 font-semibold">{{ $item->quantity }} in stock</span>
                    @else
                        <span class="text-red-400 font-semibold">Out of Stock</span>
                    @endif
                </p>
            </div>
        </div>

        <!-- Order Form -->
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <!-- Hidden input for the product ID -->
            <input type="hidden" name="items[0][product_id]" value="{{ request('product_id') }}">

            <!-- Quantity Selector -->
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-semibold text-gray-300 mb-2">Quantity</label>
                <input type="number" name="items[0][quantity]" id="quantity" value="1" min="1" 
                       class="w-full sm:w-24 px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md" required>
            </div>

            <!-- Delivery Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-semibold text-gray-300 mb-2">Delivery Address</label>
                <textarea name="address" id="address" rows="3" 
                          class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md" required>
                </textarea>
            </div>

            <!-- Payment Method -->
            <div class="mb-6">
                <label for="payment_method" class="block text-sm font-semibold text-gray-300 mb-2">Payment Method</label>
                <select name="payment_method" id="payment_method" 
                        class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 px-6 py-2 shadow-md">
                    Confirm Order
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
