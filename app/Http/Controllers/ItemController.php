<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    // Display all items
    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }

    // Show form to create a new item
    public function create()
    {
        $categories = Category::all(); // Get all categories to display in the dropdown
        return view('items.create', compact('categories'));
    }

    // Store a newly created item
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create and save item, including category_id
        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'supplier' => $request->supplier,
            'category_id' => $request->category_id,
        ]);

        // Redirect to the items index page with a success message
        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }

    // Show form to edit an existing item
    public function edit(Item $item)
    {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('items.edit', compact('item', 'categories'));
    }

    // Update the specified item
    public function update(Request $request, Item $item)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update the item with the new values, including category_id
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'supplier' => $request->supplier,
            'category_id' => $request->category_id,
        ]);

        // Redirect to the items index page with a success message
        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    // Delete the specified item
    public function destroy(Item $item)
    {
        // Delete the item
        $item->delete();

        // Redirect back to the items index page with a success message
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
