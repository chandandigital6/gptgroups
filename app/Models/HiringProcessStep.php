<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HiringProcessStep extends Model
{
    protected $guarded = ['id'];
    

     public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->latest();
    }   
}
