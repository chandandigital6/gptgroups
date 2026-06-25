<?php

namespace Database\Seeders;

use App\Models\StrategySection;
use Illuminate\Database\Seeder;

class StrategySectionSeeder extends Seeder
{

// php artisan db:seed --class=StrategySectionSeeder
    public function run(): void
    {
        StrategySection::create([
            'label' => 'Strategies',
            'title' => 'Growth strategy built around execution.',
            'description' => 'A practical operating model for brand visibility, channel confidence and consistent stock movement.',

            'strategy_1_number' => '01',
            'strategy_1_title' => 'Market Mapping',
            'strategy_1_description' => 'Identify high-potential cities, counters and B2B accounts.',

            'strategy_2_number' => '02',
            'strategy_2_title' => 'Partner Enablement',
            'strategy_2_description' => 'Train retailers with product knowledge, offers and sales tools.',

            'strategy_3_number' => '03',
            'strategy_3_title' => 'Demand Creation',
            'strategy_3_description' => 'Use campaigns, launch events and retail visibility to increase enquiries.',

            'strategy_4_number' => '04',
            'strategy_4_title' => 'Stock Rotation',
            'strategy_4_description' => 'Improve availability, reduce dead stock and maintain partner profitability.',

            'sort_order' => 0,
            'status' => 1,
        ]);
    }
}