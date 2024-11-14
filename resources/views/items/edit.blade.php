<!-- resources/views/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>

<h1>Edit Item</h1>

<!-- Display validation errors -->
@if ($errors->any())
    <div style="color: red;">
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

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description', $item->description) }}</textarea>
    </div>

    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $item->price) }}" required min="0">
    </div>

    <div>
        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier" value="{{ old('supplier', $item->supplier) }}" required>
    </div>

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            <option value="" disabled>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Save Changes</button>
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

<a href="{{ route('items.index') }}">Back to Items List</a>

</body>
</html>
