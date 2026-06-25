<?php

namespace Database\Seeders;

use App\Models\RetailOutletSection;
use Illuminate\Database\Seeder;

class RetailOutletSectionSeeder extends Seeder
{
    // php artisan db:seed --class=RetailOutletSectionSeeder
    public function run(): void
    {
        RetailOutletSection::create([
            'label' => 'Retail Outlets',
            'title' => 'Retail network designed for customer confidence.',
            'description' => 'GPT Group works with retail IRs, wholesale partners, key dealer retailers and B2B accounts to create strong last-mile availability and consistent brand visibility.',

            'card_1_title' => 'Retail IRs',
            'card_1_description' => 'Customer-facing counters and city-level presence.',

            'card_2_title' => 'Wholesale',
            'card_2_description' => 'Bulk movement and regional distribution support.',

            'card_3_title' => 'KDR Network',
            'card_3_description' => 'Key dealer relationships for premium category growth.',

            'card_4_title' => 'B2B Accounts',
            'card_4_description' => 'Corporate and institutional supply opportunities.',

            'button_text' => 'View Retail Outlet Page',
            'button_link' => '/retail-outlets',

            'image_1_alt' => 'retail outlet',
            'image_2_alt' => 'warehouse',
            'image_3_alt' => 'partner support',
            'image_4_alt' => 'business partner',

            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}