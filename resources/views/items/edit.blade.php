<x-app-layout>
    <h1 class="text-2xl font-semibold text-center text-yellow-400 mb-8">Edit Item</h1>
    <div class="max-w-3xl mx-auto p-8 bg-gray-800 rounded-2xl shadow-lg mt-10 border-2 border-yellow-400">
       
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to edit the item -->
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-yellow-400">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-yellow-400">Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required>{{ old('description', $item->description) }}</textarea>
                </div>

                <!-- Price Field -->
                <div>
                    <label for="price" class="block text-sm font-medium text-yellow-400">Price</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $item->price) }}" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required min="0">
                </div>

                <!-- Supplier Field -->
                <div>
                    <label for="supplier" class="block text-sm font-medium text-yellow-400">Supplier</label>
                    <input type="text" id="supplier" name="supplier" value="{{ old('supplier', $item->supplier) }}" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required>
                </div>
                
                <!-- Category Field -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-yellow-400">Category</label>
                    <select name="category_id" id="category_id" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required>
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity Field -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-yellow-400">Quantity Available</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" required min="0">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 text-sm font-semibold rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>

        <!-- Back to Items List Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('items.index') }}" class="text-yellow-400 hover:text-yellow-500">
                Back to Items List
            </a>
        </div>
    </div>

</x-app-layout>
