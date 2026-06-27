<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class B2bBenefitItem extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(B2bBenefitSection::class, 'b2b_benefit_section_id');
    }
}
