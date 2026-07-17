<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class AiKnowledgeDocument extends Model
{
     use SoftDeletes;
    protected $guarded = ['id'];

    protected $casts = [
        'keywords' => 'array',
        'metadata' => 'array',
        'priority' => 'integer',
        'is_active' => 'boolean',
        'is_synced' => 'boolean',
        'last_synced_at' => 'datetime',
          'source_id' => 'integer',
           
    ];
      
   

    // public function scopeActive(Builder $query): Builder
    // {
    //     return $query->where('is_active', true);
    // }

    // public function scopeForLanguage(
    //     Builder $query,
    //     string $language
    // ): Builder {
    //     return $query->where(function (Builder $query) use ($language) {
    //         $query->where('language', $language)
    //             ->orWhere('language', 'en');
    //     });
    // }


   

    /**
     * Only active knowledge documents.
     */
    public function scopeActive(
        Builder $query
    ): Builder {
        return $query->where(
            'is_active',
            true
        );
    }

    /**
     * Search requested language with English fallback.
     */
    public function scopeForLanguage(
        Builder $query,
        string $language
    ): Builder {
        $language = strtolower(
            trim($language)
        );

        return $query->where(function (
            Builder $builder
        ) use ($language): void {
            $builder
                ->where('language', $language)
                ->orWhere('language', 'en');
        });
    }

    
     
}
