<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AiLead extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'metadata' => 'array',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(
            AiVisitor::class,
            'ai_visitor_id'
        );
    }
}
