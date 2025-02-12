<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $table = 'product_subcategories';

    protected $fillable = ['category_id', 'name', 'slug', 'status'];

    public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
