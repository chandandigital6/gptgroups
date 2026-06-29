<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreOutletDetail extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function outlet()
    {
        return $this->belongsTo(StoreOutlet::class, 'store_outlet_id');
    }
}
