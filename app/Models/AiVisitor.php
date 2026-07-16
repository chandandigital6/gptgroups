<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AiVisitor extends Model
{
    protected $guarded = ['id'];

      protected $casts = [
        'last_seen_at' => 'datetime',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(AiLead::class);
    }

    public function unansweredQuestions(): HasMany
    {
        return $this->hasMany(AiUnansweredQuestion::class);
    }
}
