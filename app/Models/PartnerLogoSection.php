<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLogoSection extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function logos()
    {
        return $this->hasMany(PartnerLogo::class)->orderBy('sort_order');
    }

    public function activeLogos()
    {
        return $this->hasMany(PartnerLogo::class)
            ->where('status', 1)
            ->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
