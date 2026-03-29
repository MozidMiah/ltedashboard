<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'short_description',
        'description',

        'category_id',
        'subcategory_id',
        'brand_id',
        'color_id',
        'unit_id',
        'size_id',

        'buying_price',
        'selling_price',
        'discount_price',

        'stock_qty',
        'min_qty',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
