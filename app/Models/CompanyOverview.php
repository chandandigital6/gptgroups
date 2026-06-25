<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyOverview extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
