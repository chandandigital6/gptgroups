<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickFactSection extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(QuickFactItem::class)
            ->orderBy('sort_order');
    }

    public function activeItems()
    {
        return $this->hasMany(QuickFactItem::class)
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
