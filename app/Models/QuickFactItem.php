<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickFactItem extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function section()
    {
        return $this->belongsTo(QuickFactSection::class, 'quick_fact_section_id');
    }
}
