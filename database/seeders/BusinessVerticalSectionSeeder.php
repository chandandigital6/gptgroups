<?php

namespace Database\Seeders;

use App\Models\BusinessVerticalSection;
use Illuminate\Database\Seeder;

class BusinessVerticalSectionSeeder extends Seeder
{

// php artisan db:seed --class=BusinessVerticalSectionSeeder
    public function run(): void
    {
        $section = BusinessVerticalSection::create([
            'page_slug' => 'groups-companies',
            'section_id' => 'companies',
            'label' => 'Business Verticals',
            'title' => 'GPT Group companies and focus areas.',
            'description' => 'A modern business portfolio built around distribution, customer service, retail experience and digital growth.',
            'sort_order' => 0,
            'status' => 1,
        ]);

        $section->items()->createMany([
            [
                'badge_text' => 'Core Vertical',
                'theme' => 'blue',
                'title' => 'Telecom Distribution',
                'description' => 'GPT Group’s foundation is telecom distribution, covering mobile devices, smartphones, tablets, accessories and partner supply for B2B and B2C channels.',
                'image_alt' => 'Telecom Distribution',
                'tags' => 'Mobiles, Tablets, Accessories',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'badge_text' => 'Digital',
                'theme' => 'cyan',
                'title' => 'Online Services & E-Commerce',
                'description' => 'Online services and retail channels help GPT Group reach digital customers, manage product visibility and support modern buying experiences.',
                'image_alt' => 'Online Services',
                'tags' => 'Online Retail, Digital Sales',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'badge_text' => 'Lifestyle',
                'theme' => 'pink',
                'title' => 'Beauty Care',
                'description' => 'Beauty care is part of GPT Group’s lifestyle expansion, supporting personal care, customer experience and modern retail opportunities.',
                'image_alt' => 'Beauty Care',
                'tags' => 'Beauty, Personal Care',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'badge_text' => 'Retail',
                'theme' => 'slate',
                'title' => 'Fashion Retail',
                'description' => 'Fashion retail strengthens the group’s lifestyle portfolio with consumer-focused products, retail merchandising and market-facing customer experience.',
                'image_alt' => 'Fashion Retail',
                'tags' => 'Fashion, Retail',
                'sort_order' => 3,
                'status' => 1,
            ],
            [
                'badge_text' => 'Technology',
                'theme' => 'blue',
                'title' => 'I.T. Solutions',
                'description' => 'I.T. services support the group’s digital operations, business solutions, automation and technology-led service delivery.',
                'image_alt' => 'IT Solutions',
                'tags' => 'IT, Automation',
                'sort_order' => 4,
                'status' => 1,
            ],
            [
                'badge_text' => 'Service',
                'theme' => 'cyan',
                'title' => 'Hospitality',
                'description' => 'Hospitality reflects GPT Group’s service-led expansion, focusing on customer experience, operations and quality-driven business standards.',
                'image_alt' => 'Hospitality',
                'tags' => 'Hospitality, Service',
                'sort_order' => 5,
                'status' => 1,
            ],
        ]);
    }
}