<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqSection extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];


    
    public function items()
    {
        return $this->hasMany(FaqItem::class)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc');
    }
  

    public function activeItems()
    {
        return $this->hasMany(FaqItem::class)
            ->where('status', 1)
            ->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeForPage($query, string $pageSlug)
    {
        return $query->where('page_slug', $pageSlug);
    }
}
