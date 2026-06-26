<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairServiceSection extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(RepairServiceItem::class)
            ->orderBy('sort_order');
    }

    public function activeItems()
    {
        return $this->hasMany(RepairServiceItem::class)
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
