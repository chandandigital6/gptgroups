<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessVerticalItem extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(BusinessVerticalSection::class, 'business_vertical_section_id');
    }

    public function tagList(): array
    {
        if (! $this->tags) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $this->tags)));
    }
}
