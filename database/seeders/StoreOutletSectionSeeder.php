<?php

namespace Database\Seeders;

use App\Models\StoreOutletSection;
use Illuminate\Database\Seeder;

class StoreOutletSectionSeeder extends Seeder
{

// php artisan db:seed --class=StoreOutletSectionSeeder
    public function run(): void
    {
        $section = StoreOutletSection::create([
            'page_slug' => 'outlets',
            'section_id' => 'outlets',

            'label' => 'Our Outlets',
            'title' => 'Retail & Service Locations',
            'description' => 'Official showrooms and partner outlets listed for customer convenience and business visibility.',

            'button_text' => 'Open Partner Outlet',
            'button_link' => route('contact'),

            'cta_label' => 'Partner Outlet',
            'cta_title' => 'Want to open an authorized mobile store?',
            'cta_description' => 'GPT Group supports businesses and entrepreneurs with authorized mobile store setup, brand standards, retail guidance and market execution.',
            'cta_button_text' => 'Start Enquiry',
            'cta_button_link' => route('contact'),

            'sort_order' => 0,
            'status' => 1,
        ]);

        $outlets = [
            [
                'title' => 'GPT Samsung Lounge',
                'subtitle' => 'Showroom @ Ruwi, Muscat',
                'badge' => 'Official Showroom',
                'theme' => 'blue',
                'image_alt' => 'GPT Samsung Lounge',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 0,
                'status' => 1,
                'details' => [
                    ['label' => 'Company', 'value' => 'Global Phone Technology'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Contact Person', 'value' => 'Mr. Shafi'],
                    ['label' => 'Contact No', 'value' => '+968 7258 8851'],
                ],
            ],
            [
                'title' => 'GPT Hikvision Salalah',
                'subtitle' => 'Showroom @ Salalah',
                'badge' => 'Showroom',
                'theme' => 'cyan',
                'image_alt' => 'GPT Hikvision Salalah',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 1,
                'status' => 1,
                'details' => [
                    ['label' => 'Outlet', 'value' => 'Globtech Mobile Showroom'],
                    ['label' => 'Location', 'value' => 'Ruwi Heights, Muscat, Oman'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Contact', 'value' => 'Mr. Sudhanshu Mishra | +968 9810 0827'],
                ],
            ],
            [
                'title' => 'GPT Service Centre',
                'subtitle' => 'Service Centre @ Sur, Muscat',
                'badge' => 'Service Centre',
                'theme' => 'blue',
                'image_alt' => 'GPT Service Centre',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 2,
                'status' => 1,
                'details' => [
                    ['label' => 'Outlet', 'value' => 'Globtech Mobile Showroom'],
                    ['label' => 'Address', 'value' => 'ONTC Bus Stop, Sur, Oman'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Service', 'value' => 'Customer support and product assistance'],
                ],
            ],
            [
                'title' => 'Honor Phone Outlet',
                'subtitle' => 'Showroom @ Sohar',
                'badge' => 'Official Showroom',
                'theme' => 'blue',
                'image_alt' => 'Honor Phone Outlet',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 3,
                'status' => 1,
                'details' => [
                    ['label' => 'Location', 'value' => 'Al Hambar, Sohar, Oman'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Contact Person', 'value' => 'Mr. Sudhanshu Mishra'],
                    ['label' => 'Contact No', 'value' => '+968 9810 0827'],
                ],
            ],
            [
                'title' => 'GPT Samsung Lounge',
                'subtitle' => 'Showroom @ Salalah',
                'badge' => 'Showroom',
                'theme' => 'cyan',
                'image_alt' => 'GPT Samsung Lounge Salalah',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 4,
                'status' => 1,
                'details' => [
                    ['label' => 'Outlet', 'value' => 'Honor Phone Outlet'],
                    ['label' => 'Location', 'value' => 'Salalah, Oman'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Contact', 'value' => 'Mr. Sudhanshu Mishra | +968 9810 0827'],
                ],
            ],
        ];

        foreach ($outlets as $outletData) {
            $details = $outletData['details'] ?? [];
            unset($outletData['details']);

            $outlet = $section->outlets()->create($outletData);

            foreach ($details as $index => $detail) {
                $outlet->details()->create([
                    'label' => $detail['label'],
                    'value' => $detail['value'],
                    'sort_order' => $index,
                    'status' => 1,
                ]);
            }
        }
    }
}