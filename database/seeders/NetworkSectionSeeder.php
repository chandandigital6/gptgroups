<?php

namespace Database\Seeders;

use App\Models\NetworkSection;
use Illuminate\Database\Seeder;

class NetworkSectionSeeder extends Seeder
{
    // php artisan db:seed --class=NetworkSectionSeeder
    public function run(): void
    {
        NetworkSection::create([
            'label' => 'Network',
            'title' => 'Oman market coverage with retail and warehouse support.',
            'description' => 'GPT Group network retail, wholesale and B2B channels ko supply-chain execution ke saath support karta hai.',

            'card_1_title' => 'Sur & Salalah',
            'card_1_description' => 'Regional market coverage.',

            'card_2_title' => 'MCT-Ghala & Sohar',
            'card_2_description' => 'Warehouse and stock support.',

            'button_text' => 'View Network',
            'button_link' => '/network',

            'image_alt' => 'GPT Network',

            'overlay_title' => 'Retail + Warehouse',
            'overlay_description' => 'Built for fast stock movement and partner success.',

            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}