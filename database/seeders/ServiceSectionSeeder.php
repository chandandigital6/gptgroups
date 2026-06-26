<?php

namespace Database\Seeders;

use App\Models\ServiceSection;
use Illuminate\Database\Seeder;

class ServiceSectionSeeder extends Seeder
{

//php artisan db:seed --class=ServiceSectionSeeder
    public function run(): void
    {
        $section = ServiceSection::create([
            'label' => 'Services',
            'title' => 'Customer & Business Support',
            'description' => 'GPT Group customers and partners ke liye repair, B2B supply, retail support and distribution solutions.',
            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->items()->createMany([
            [
                'label' => 'GPT Care',
                'title' => 'Mobile Repair & Service',
                'description' => 'Screen, battery, software, water damage and mobile service enquiries ke liye professional support.',
                'button_link' => '/services#gpt-care',
                'accent_color' => 'blue',
                'image_alt' => 'GPT Care',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'label' => 'B2B Program',
                'title' => 'Business Distribution Support',
                'description' => 'Corporate supply, wholesale, dealer network and operational efficiency ke liye B2B support.',
                'button_link' => '/services#b2b-program',
                'accent_color' => 'cyan',
                'image_alt' => 'B2B Program',
                'sort_order' => 1,
                'status' => 1,
            ],
        ]);
    }
}