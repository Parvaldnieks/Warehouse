<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
</head>
<body>
    <h1>All Items</h1>

    <!-- Display success message -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('items.create') }}">Create New Item</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}€</td>
                <td>{{ $item->supplier }}</td>
                <td>{{ $item->category->name ?? 'No category' }}</td>
                <td>
                    <!-- Edit link -->
                    <a href="{{ route('items.edit', $item->id) }}">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>

