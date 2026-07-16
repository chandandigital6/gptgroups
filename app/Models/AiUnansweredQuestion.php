<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiUnansweredQuestion extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'asked_count' => 'integer',
        'is_resolved' => 'boolean',
    ];

    public function visitor()
    {
        return $this->belongsTo(
            AiVisitor::class,
            'ai_visitor_id'
        );
    }
}
