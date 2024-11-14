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

    <!-- resources/views/items/create.blade.php -->
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
            
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
            
        <label for="supplier">Supplier:</label>
        <input type="text" name="supplier">
            
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required>
            
        <button type="submit">Create Item</button>
    </form>
</body>
</html>
