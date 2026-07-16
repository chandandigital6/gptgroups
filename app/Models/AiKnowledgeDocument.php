<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class AiKnowledgeDocument extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'keywords' => 'array',
        'metadata' => 'array',
        'priority' => 'integer',
        'is_active' => 'boolean',
        'is_synced' => 'boolean',
        'last_synced_at' => 'datetime',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeForLanguage(
        Builder $query,
        string $language
    ): Builder {
        return $query->where(function (Builder $query) use ($language) {
            $query->where('language', $language)
                ->orWhere('language', 'en');
        });
    }


     
}
