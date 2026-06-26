<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLogo extends Model
{
    protected $guarded = ['id'];
    
    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(PartnerLogoSection::class, 'partner_logo_section_id');
    }
}
