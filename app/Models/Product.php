<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    

        protected $casts = [
        'gallery' => 'array',
        'tags' => 'array',
        'specifications' => 'array',
        'launch_date' => 'date',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
