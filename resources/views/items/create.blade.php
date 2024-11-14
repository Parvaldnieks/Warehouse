<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
</head>
<body>
    <h1>Create New Item</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Form for creating the item -->
    <form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Item Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
    </div>

    <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" required>
    </div>

    <div>
        <label for="supplier">Supplier</label>
        <input type="text" name="supplier" id="supplier" value="{{ old('supplier') }}" required>
    </div>

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            <option value="" disabled selected>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Create Item</button>
    </form>

    <!-- Form for creating a new category -->
    <h2>Add a New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="category_name">Category Name</label>
            <input type="text" name="name" id="category_name" required>
        </div>

        <button type="submit">Create Category</button>
    </form>
</body>
</html>
