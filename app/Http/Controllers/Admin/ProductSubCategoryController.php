<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        $product_subcategory = ProductSubCategory::with('productCategory') // Relationship name fixed
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.productsubcategory.index', compact('product_subcategory'));
    }

    public function create()
    {
        return view('admin.productsubcategory.create');
    }
}
