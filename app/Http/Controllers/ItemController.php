<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Order;

class ItemController extends Controller
{
    // Display all items with optional category and quantity filters
    public function index(Request $request)
    {
        $categoryId = $request->input('category');
        $quantityFilter = $request->input('quantity');
        $categories = Category::all();

        // Start query builder
        $query = Item::with('category');

        // Apply category filter if present
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Apply quantity filter
        if (isset($quantityFilter)) {
            if ($quantityFilter === '0') {
                // Out of stock
                $query->where('quantity', 0);
            } elseif ($quantityFilter === 'low') {
                // Low stock (assuming less than 10)
                $query->where('quantity', '<', 10);
            } elseif ($quantityFilter === 'high') {
                // In stock (more than 10)
                $query->where('quantity', '>=', 10);
            }
        }

        // Get the filtered items
        $items = $query->get();

        return view('items.index', compact('items', 'categories'));
    }

    // Show form to create a new item
    public function create()
    {
        $categories = Category::all(); // Get all categories to display in the dropdown
        return view('items.create', compact('categories'));
    }

    // Store a newly created category
    public function storeCategory(Request $request)
    {
        // Validate the category name
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:20',
                'regex:/^[a-zA-Z]+$/', // Only letters allowed
            ],
        ]);
    
        // Normalize the category name by trimming and converting to lowercase
        $normalizedCategoryName = strtolower(trim($request->name));
    
        // Check for duplicates (case-insensitive)
        $existingCategory = Category::whereRaw('LOWER(TRIM(name)) = ?', [$normalizedCategoryName])->first();
    
        if ($existingCategory) {
            return redirect()->back()->withErrors(['name' => 'Category already exists.']);
        }
    
        // Create the category
        Category::create([
            'name' => ucfirst($normalizedCategoryName), // Save the name with the first letter capitalized
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
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
            'category_id' => [
                'required',
                'exists:categories,id', // Ensure category_id exists in the categories table
                function ($attribute, $value, $fail) {
                    // Check if the associated category has a valid name
                    $category = Category::find($value);
                    if ($category && !preg_match('/^[a-zA-Z]+$/', $category->name)) {
                        $fail('The selected category has an invalid name.');
                    }
                },
            ],
            'quantity' => 'required|integer|min:0',
        ]);

        // Create and save the item
        Item::create($request->only(['name', 'description', 'price', 'supplier', 'category_id', 'quantity']));

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
            'category_id' => [
                'required',
                'exists:categories,id', // Ensure category_id exists in the categories table
                function ($attribute, $value, $fail) {
                    // Check if the associated category has a valid name
                    $category = Category::find($value);
                    if ($category && !preg_match('/^[a-zA-Z]+$/', $category->name)) {
                        $fail('The selected category has an invalid name.');
                    }
                },
            ],
            'quantity' => 'required|integer|min:0',
        ]);

        // Update the item
        $item->update($request->only(['name', 'description', 'price', 'supplier', 'category_id', 'quantity']));

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

    // Dashboard - Returns counts for items, low stock, and recent orders
    public function dashboard()
    {
        $totalItems = Item::count();
        $lowStockItemsCount = Item::where('quantity', '<', 10)->count();

        // Fetch the count of the 5 most recent orders
        $recentOrdersCount = Order::latest()->take(5)->count(); 

        return view('dashboard', compact('totalItems', 'lowStockItemsCount', 'recentOrdersCount'));
    }

    // Show a specific item
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

}
