<x-app-layout>
    <!-- Product Information -->
    <div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md text-gray-300 border-4 border-yellow-400">
        <h1 class="text-2xl font-bold text-yellow-400 mb-4">{{ $item->name }}</h1>
        <p class="text-lg mb-2">Description: {{ $item->description }}</p>
        <p class="text-lg mb-2">Price: <span class="text-yellow-300 font-semibold">${{ $item->price }}</span></p>
        <p class="text-lg mb-2">Category: {{ $item->category->name }}</p>
        <p class="text-lg mb-4">Stock: 
            @if ($item->quantity > 0)
                <span class="text-green-400 font-semibold">{{ $item->quantity }}</span>
            @else
                <span class="text-red-400 font-semibold">Out of Stock</span>
            @endif
        </p>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-wrap justify-center space-x-4 mt-6">
        <!-- Back Button -->
        <a href="{{ route('items.index') }}" 
           class="bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 px-4 py-2 shadow-md mb-2 sm:mb-0">
            Back to Items
        </a>

        <!-- Edit Button -->
        <a href="{{ route('items.edit', $item->id) }}" 
           class="bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 px-4 py-2 shadow-md mb-2 sm:mb-0">
            Edit
        </a>

        <!-- Delete Button -->
        <form action="{{ route('items.destroy', $item->id) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this item?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 px-4 py-2 shadow-md mb-2 sm:mb-0">
                Delete
            </button>
        </form>

        <!-- Order Button -->
        @if ($item->quantity > 0)
            <form action="{{ route('orders.create') }}" method="GET">
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <button type="submit" 
                        class="bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 px-4 py-2 shadow-md mb-2 sm:mb-0">
                    Order
                </button>
            </form>
        @else
            <button disabled 
                    class="bg-gray-500 text-gray-200 font-semibold rounded-md px-4 py-2 shadow-md mb-2 sm:mb-0">
                Out of Stock
            </button>
        @endif
    </div>
</x-app-layout>
