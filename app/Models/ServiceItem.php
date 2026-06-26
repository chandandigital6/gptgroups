<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    protected $guarded = ['id'];

       protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(ServiceSection::class, 'service_section_id');
    }
}
