<?php

namespace Database\Seeders;

use App\Models\PartnerLogoSection;
use Illuminate\Database\Seeder;

class PartnerLogoSectionSeeder extends Seeder
{
    //php artisan db:seed --class=PartnerLogoSectionSeeder
    public function run(): void
    {
        $section = PartnerLogoSection::create([
            'label' => 'Partner Logos',
            'title' => 'Trusted brand ecosystem.',
            'description' => 'Use this section for final authorised partner logos. Current cards are editable placeholders.',
            'sort_order' => 0,
            'status' => 1,
        ]);

        foreach (['Samsung', 'LAVA', 'Apple', 'Nokia', 'Vivo', 'Xiaomi', 'Huawei', 'Sony'] as $index => $name) {
            $section->logos()->create([
                'name' => $name,
                'sort_order' => $index,
                'status' => 1,
            ]);
        }
    }
}