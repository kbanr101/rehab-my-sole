<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories')); // Pass data to the view
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name||max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Create the category
        Category::create($validated);

        // Redirect to the category index with a success message
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(Request $request, Category $category)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id . '||max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id . '|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Update the category
        $category->update($validated);

        // Redirect to the category index with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to the category index with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
