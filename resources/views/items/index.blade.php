<x-app-layout>
    <body class="bg-gray-900 text-gray-200">
        <div class="max-w-6xl mx-auto p-4">
            <h1 class="text-3xl font-semibold text-center text-yellow-400 mb-8">All Items</h1>

            <!-- Display success message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 rounded-md mb-6 p-4">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Filter by Category and Quantity -->
            <form method="GET" action="{{ route('items.index') }}" class="mb-6 text-center flex flex-col sm:flex-row sm:justify-center sm:space-x-4">
                <div class="flex items-center mb-4 sm:mb-0">
                    <label for="category" class="text-gray-300 mr-2">Filter by Category:</label>
                    <select name="category" id="category" class="bg-gray-800 text-gray-300 p-2 rounded-md">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center mb-4 sm:mb-0">
                    <label for="quantity" class="text-gray-300 mr-2">Filter by Quantity:</label>
                    <select name="quantity" id="quantity" class="bg-gray-800 text-gray-300 p-2 rounded-md">
                        <option value="">All Quantities</option>
                        <option value="0" {{ request('quantity') === '0' ? 'selected' : '' }}>Out of Stock</option>
                        <option value="low" {{ request('quantity') === 'low' ? 'selected' : '' }}>Low Stock</option>
                        <option value="high" {{ request('quantity') === 'high' ? 'selected' : '' }}>In Stock</option>
                    </select>
                </div>

                <button type="submit" class="bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 p-2">
                    Filter
                </button>
            </form>

            <!-- Items Table -->
            <div class="overflow-x-auto rounded-xl shadow-md border-2 border-yellow-400 p-0">
                <table class="min-w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Name</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Description</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Price</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Supplier</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Category</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Quantity</th>
                            <th class="text-sm font-medium text-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="bg-gray-700 hover:bg-gray-600 border-b border-gray-600">
                                <td class="px-4 py-2 text-gray-200">{{ $item->name }}</td>
                                <td class="px-4 py-2 text-gray-200">{{ $item->description }}</td>
                                <td class="px-4 py-2 text-gray-200">{{ $item->price }}€</td>
                                <td class="px-4 py-2 text-gray-200">{{ $item->supplier }}</td>
                                <td class="px-4 py-2 text-gray-200">{{ $item->category->name ?? 'No category' }}</td>
                                <td class="px-4 py-2 text-gray-200">{{ $item->quantity }}</td>
                                <td class="px-4 py-2">
                                    <!-- Edit Link -->
                                    <a href="{{ route('items.show', $item->id) }}" 
                                        class="text-blue-400 hover:text-blue-500 text-sm font-semibold">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-app-layout>
