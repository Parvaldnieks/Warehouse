<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Display all items
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items')); // Correct view name
    }

    // Show form to create a new item
    public function create()
    {
        return view('items.create'); // Correct view name
    }

    // Store a newly created item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
        ]);

        // Create and save item
        Item::create($request->only(['name', 'description', 'price', 'supplier']));

        // Redirect to 'items.index' route after successful creation
        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }

    // Show form to edit an existing item
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Correct view name
    }

    // Update the specified item
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
        ]);

        $item->update($request->only(['name', 'description', 'price', 'supplier']));

        // Redirect to 'items.index' route after successful update
        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(Item $item)
    {
        // Delete the item from the database
        $item->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
