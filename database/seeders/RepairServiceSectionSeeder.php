<?php

namespace Database\Seeders;

use App\Models\RepairServiceSection;
use Illuminate\Database\Seeder;

class RepairServiceSectionSeeder extends Seeder
{

//  php artisan db:seed --class=RepairServiceSectionSeeder
    public function run(): void
    {
        $section = RepairServiceSection::create([
            'page_slug' => 'services',
            'label' => 'Mobile Repair Services',
            'title' => 'Common repair solutions.',
            'description' => 'GPT Care handles day-to-day smartphone issues with professional diagnostics and repair support.',
            'button_text' => 'Book Repair',
            'button_link' => '#service-form',
            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->items()->createMany([
            [
                'title' => 'Screen Replacement',
                'description' => 'Cracked or shattered screen replacement with standard warranty.',
                'image_alt' => 'Screen Replacement',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'title' => 'Battery Issues',
                'description' => 'Battery health diagnosis and replacement for fast draining devices.',
                'image_alt' => 'Battery Issues',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Software & Performance',
                'description' => 'Slow performance, startup issues, freezing and OS support.',
                'image_alt' => 'Software Performance',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'title' => 'Water Damage',
                'description' => 'Moisture damage cleaning, testing and component-level diagnostics.',
                'image_alt' => 'Water Damage',
                'sort_order' => 3,
                'status' => 1,
            ],
        ]);
    }
}