<?php

namespace Database\Seeders;

use App\Models\TestimonialSection;
use Illuminate\Database\Seeder;

class TestimonialSectionSeeder extends Seeder
{
    //php artisan db:seed --class=TestimonialSectionSeeder
    public function run(): void
    {
        $section = TestimonialSection::create([
            'label' => 'Testimonials',
            'title' => 'What partners say about GPT Group.',
            'description' => null,
            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->testimonials()->createMany([
            [
                'message' => 'GPT Group brings speed, clarity and discipline to retail distribution. Their team understands market requirements.',
                'name' => 'Retail Partner',
                'designation' => 'Partner',
                'location' => 'Muscat',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'message' => 'Strong warehouse support and reliable communication make them a dependable partner for product movement.',
                'name' => 'Wholesale Partner',
                'designation' => 'Partner',
                'location' => 'Oman',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'message' => 'Their leadership team is proactive in launch planning, partner training and customer support.',
                'name' => 'Brand Associate',
                'designation' => 'Associate',
                'location' => 'GCC',
                'sort_order' => 2,
                'status' => 1,
            ],
        ]);
    }
}