<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_category = ProductCategory::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.productcategory.index', compact('product_category'));
    }

    public function create()
    {
        return view('admin.productcategory.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name||max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        ProductCategory::create($validated);
        return redirect()->route('productcategory.index')->with('success', 'Product Category created successfully.');
    }

    public function edit($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        return view('admin.productcategory.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $productcategory)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $productcategory->id . '||max:255',
            'slug' => 'required|string|unique:categories,slug,' . $productcategory->id . '|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Update the category
        $productcategory->update($validated);

        return redirect()->route('productcategory.index')->with('success', 'Product Category updated successfully.');
    }

    public function destroy(ProductCategory $productcategory)
    {

        $productcategory->delete();

        return redirect()->route('productcategory.index')->with('success', 'Product Category deleted successfully.');
    }
}
