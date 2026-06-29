<?php

namespace Database\Seeders;

use App\Models\CommonSplitSection;
use Illuminate\Database\Seeder;

class CommonSplitSectionSeeder extends Seeder
{

// php artisan db:seed --class=CommonSplitSectionSeeder
    public function run(): void
    {
        $section = CommonSplitSection::create([
            'page_slug' => 'outlets',
            'section_key' => 'customer-satisfaction',

            'label' => 'Customer Satisfaction',
            'title' => 'We aim for professional telecom retail execution.',
            'description_1' => 'GPT Group’s vision is to become one of the most professional and respected telecom distributors in Oman and the UAE, creating value for partners and retail customers.',
            'description_2' => 'The company supports retail growth through automated distribution processes, demand generation activities, product knowledge and training, efficient supply-chain management and customer service.',

            'image_1_alt' => 'Retail outlet',
            'image_2_alt' => 'Technology retail',
            'image_3_alt' => 'Supply chain',

            'card_value' => 'GPT',
            'card_title' => 'Retail Support',
            'card_description' => 'Store setup, visibility and market execution.',

            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->items()->createMany([
            [
                'icon_text' => '01',
                'theme' => 'blue',
                'title' => 'Demand Generation',
                'description' => 'Promotional campaigns and market visibility for partner stores.',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'icon_text' => '02',
                'theme' => 'cyan',
                'title' => 'Product Training',
                'description' => 'Product knowledge and support for sales teams and retail counters.',
                'sort_order' => 1,
                'status' => 1,
            ],
        ]);
    }
}