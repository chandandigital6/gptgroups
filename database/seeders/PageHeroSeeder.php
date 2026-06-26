<?php

namespace Database\Seeders;

use App\Models\PageHero;
use Illuminate\Database\Seeder;

class PageHeroSeeder extends Seeder
{

// php artisan db:seed --class=PageHeroSeeder
    public function run(): void
    {
        PageHero::create([
            'page_slug' => 'services',
            'badge_text' => 'GPT Group Services',

            'title_line_1' => 'Smart Services For',
            'title_line_2' => 'Customers & Businesses',

            'description' => 'GPT Group provides reliable mobile repair support through GPT Care and business-focused distribution solutions through GPT B2B Programs.',

            'primary_button_text' => 'GPT Care',
            'primary_button_link' => '#gpt-care',

            'secondary_button_text' => 'B2B Programs',
            'secondary_button_link' => '#b2b-program',

            'stat_1_value' => 'Care',
            'stat_1_label' => 'Repair',

            'stat_2_value' => 'B2B',
            'stat_2_label' => 'Program',

            'stat_3_value' => 'Oman',
            'stat_3_label' => 'Support',

            'stat_4_value' => 'Fast',
            'stat_4_label' => 'Service',

            'image_alt' => 'GPT Group Services',

            'card_title' => 'Repair + Business Support',
            'card_description' => 'GPT Care for customers and GPT B2B Programs for business partners.',

            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}