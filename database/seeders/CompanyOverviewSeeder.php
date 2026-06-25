<?php

namespace Database\Seeders;

use App\Models\CompanyOverview;
use Illuminate\Database\Seeder;

class CompanyOverviewSeeder extends Seeder
{

// php artisan db:seed --class=CompanyOverviewSeeder
    public function run(): void
    {
        CompanyOverview::create([
            'label' => 'Company Overview',
            'title' => 'Bringing latest tech to GCC markets.',
            'description' => 'Through automated distribution, demand generation, product training, supply-chain management and customer service, GPT Group supports brands and retail partners with a scalable market expansion model.',

            'card_1_title' => 'Distribution',
            'card_1_description' => 'Brand launches, channel supply and partner coverage.',

            'card_2_title' => 'Marketing',
            'card_2_description' => 'Demand generation, campaigns and retail visibility.',

            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}