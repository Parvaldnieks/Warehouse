<x-app-layout>
    <body class="bg-gray-900 text-gray-300 font-sans">
        <!-- Page Content -->
        <div class="max-w-6xl mx-auto px-4 py-10">

            <!-- Title -->
            <h1 class="text-3xl font-semibold text-center text-yellow-400 mb-8">Create New Item</h1>

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

            <!-- Create Item Form -->
            <form action="{{ route('items.store') }}" method="POST" class="bg-gray-800 p-6 rounded-2xl shadow-md border-2 border-yellow-400">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">Item Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-300 mb-2">Description</label>
                    <textarea name="description" id="description" class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-semibold text-gray-300 mb-2">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                </div>

                <div class="mb-6">
                    <label for="supplier" class="block text-sm font-semibold text-gray-300 mb-2">Supplier</label>
                    <input type="text" name="supplier" id="supplier" value="{{ old('supplier') }}" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                </div>

                <!-- Category Dropdown -->
                <div class="mb-6">
                    <label for="category_id" class="block text-sm font-semibold text-gray-300 mb-2">Category</label>
                    <select name="category_id" id="category_id" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity Field -->
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-semibold text-gray-300 mb-2">Quantity Available</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" min="0" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mb-6">
                    <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50">
                        Create Item
                    </button>
                </div>
            </form>

            <br>

            <!-- Category Creation -->
            <h2 class="text-2xl font-semibold text-center text-yellow-400 mb-6">Add a New Category</h2>
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->has('name'))
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                    <ul>
                        <li>{{ $errors->first('name') }}</li>
                    </ul>
                </div>
            @endif
            <form action="{{ route('categories.store') }}" method="POST" class="bg-gray-800 p-6 rounded-2xl shadow-md border-2 border-yellow-400">
                @csrf

                <div class="mb-4">
                    <label for="category_name" class="block text-sm font-semibold text-gray-300 mb-2">Category Name</label>
                    <input type="text" name="name" id="category_name" value="{{ old('name') }}" required class="w-full px-4 py-2 bg-gray-700 text-gray-100 border border-gray-600 rounded-md">
                </div>

                <!-- Submit Button for Category -->
                <div class="flex justify-center mb-6">
                    <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>
