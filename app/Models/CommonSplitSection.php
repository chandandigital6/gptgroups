<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonSplitSection extends Model
{
    protected $guarded = ['id'];

       protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(CommonSplitItem::class)->orderBy('sort_order');
    }

    public function activeItems()
    {
        return $this->hasMany(CommonSplitItem::class)
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

    public function scopeForKey($query, string $sectionKey)
    {
        return $query->where('section_key', $sectionKey);
    }
}
