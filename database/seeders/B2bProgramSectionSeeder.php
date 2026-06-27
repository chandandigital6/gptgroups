<?php

namespace Database\Seeders;

use App\Models\B2bProgramSection;
use Illuminate\Database\Seeder;

class B2bProgramSectionSeeder extends Seeder
{
    //php artisan db:seed --class=B2bProgramSectionSeeder
    public function run(): void
    {
        B2bProgramSection::create([
            'page_slug' => 'services',
            'label' => 'GPT B2B Programs',
            'title' => 'Business-to-business distribution programs.',
            'description_1' => 'GPT Group’s B2B programs are designed to empower organizations with top-tier service, innovative solutions and seamless distribution of mobile devices, smartphones, tablets and accessories.',
            'description_2' => 'The program is built on integrity, transparency and speed of execution, helping partners improve operational efficiency and achieve business goals.',
            'image_alt' => 'GPT B2B Program',
            'card_title' => 'B2B Growth Support',
            'card_description' => 'Distribution, operational efficiency and long-term partnership.',
            'feature_1_title' => 'Seamless Distribution',
            'feature_1_description' => 'Mobile devices, smartphones, tablets and accessories for business needs.',
            'feature_2_title' => 'Tailor-Made Strategies',
            'feature_2_description' => 'Client-specific plans to maximize operational efficiency.',
            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}