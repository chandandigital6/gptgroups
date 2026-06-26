<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialSection extends Model
{
    protected $guarded = ['id'];

     protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class)->orderBy('sort_order');
    }

    public function activeTestimonials()
    {
        return $this->hasMany(Testimonial::class)
            ->where('status', 1)
            ->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
