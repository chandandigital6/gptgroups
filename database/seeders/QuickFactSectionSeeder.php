<?php

namespace Database\Seeders;

use App\Models\QuickFactSection;
use Illuminate\Database\Seeder;

class QuickFactSectionSeeder extends Seeder
{
    //php artisan db:seed --class=QuickFactSectionSeeder
    public function run(): void
    {
        $section = QuickFactSection::create([
            'page_slug' => 'about',
            'label' => null,
            'title' => null,
            'description' => null,
            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->items()->createMany([
            [
                'value' => '2016',
                'title' => 'GPT Founded',
                'description' => 'Started as a modern technology distributor in Oman.',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'value' => '20+',
                'title' => 'Years Leadership',
                'description' => 'Founder’s Middle East telecom industry experience.',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'value' => 'GCC',
                'title' => 'Market Coverage',
                'description' => 'Oman, UAE, Kuwait and regional business exposure.',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'value' => 'B2B',
                'title' => 'Retail Support',
                'description' => 'Distribution, dealer support and business programs.',
                'sort_order' => 3,
                'status' => 1,
            ],
        ]);
    }
}