<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreOutlet extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(StoreOutletSection::class, 'store_outlet_section_id');
    }

    public function details()
    {
        return $this->hasMany(StoreOutletDetail::class)->orderBy('sort_order');
    }

    public function activeDetails()
    {
        return $this->hasMany(StoreOutletDetail::class)
            ->where('status', 1)
            ->orderBy('sort_order');
    }
}
