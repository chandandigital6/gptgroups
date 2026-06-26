<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'is_open' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(FaqSection::class, 'faq_section_id');
    }
}
