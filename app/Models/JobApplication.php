<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = ['id'];

      public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class, 'job_position_id');
    }

     public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->latest();
    }
}
