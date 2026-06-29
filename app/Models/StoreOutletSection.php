<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreOutletSection extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function outlets()
    {
        return $this->hasMany(StoreOutlet::class)->orderBy('sort_order');
    }

    public function activeOutlets()
    {
        return $this->hasMany(StoreOutlet::class)
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
