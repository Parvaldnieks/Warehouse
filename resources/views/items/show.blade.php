<x-app-layout>
    <body class="bg-gray-900 text-gray-200">
        <div class="max-w-4xl mx-auto p-6">
            <!-- Item Title -->
            <h1 class="text-4xl font-bold text-center text-yellow-400 mb-8 uppercase">{{ $item->name }}</h1>

            <!-- Item Details Card -->
            <div class="bg-gray-800 border-2 border-yellow-400 rounded-lg shadow-lg p-6 space-y-6">
                <!-- Description -->
                <div>
                    <h2 class="text-2xl font-semibold text-yellow-400">Description:</h2>
                    <p class="text-gray-300 text-lg">{{ $item->description }}</p>
                </div>

                <!-- Price -->
                <div>
                    <h2 class="text-2xl font-semibold text-yellow-400">Price:</h2>
                    <p class="text-gray-300 text-lg">{{ $item->price }}€</p>
                </div>

                <!-- Supplier -->
                <div>
                    <h2 class="text-2xl font-semibold text-yellow-400">Supplier:</h2>
                    <p class="text-gray-300 text-lg">{{ $item->supplier }}</p>
                </div>

                <!-- Category -->
                <div>
                    <h2 class="text-2xl font-semibold text-yellow-400">Category:</h2>
                    <p class="text-gray-300 text-lg">{{ $item->category->name ?? 'No category' }}</p>
                </div>

                <!-- Quantity/Stock Status -->
                <div>
                    <h2 class="text-2xl font-semibold text-yellow-400">Stock Status:</h2>
                    <p class="text-gray-300 text-lg">
                        @if ($item->quantity == 0)
                            <span class="text-red-500">Out of Stock</span>
                        @elseif ($item->quantity < 10)
                            <span class="text-orange-400">Low Stock ({{ $item->quantity }})</span>
                        @else
                            <span class="text-green-400">In Stock ({{ $item->quantity }})</span>
                        @endif
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center space-x-4">
                    <!-- Back Button -->
                    <a href="{{ route('items.index') }}" 
                       class="bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 px-4 py-2 shadow-md">
                        Back to Items
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('items.edit', $item->id) }}" 
                       class="bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 px-4 py-2 shadow-md">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 px-4 py-2 shadow-md">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
