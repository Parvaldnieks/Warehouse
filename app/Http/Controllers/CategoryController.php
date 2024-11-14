<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Store a newly created category
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:20|unique:categories,name',
        ]);

        // Create the category
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }
}
