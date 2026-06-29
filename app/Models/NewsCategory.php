<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function posts()
    {
        return $this->hasMany(NewsPost::class);
    }

    public function activePosts()
    {
        return $this->hasMany(NewsPost::class)
            ->where('status', 1)
            ->orderByDesc('published_date')
            ->orderByDesc('id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
