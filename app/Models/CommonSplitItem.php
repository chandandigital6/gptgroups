<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonSplitItem extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section()
    {
        return $this->belongsTo(CommonSplitSection::class, 'common_split_section_id');
    }
}
