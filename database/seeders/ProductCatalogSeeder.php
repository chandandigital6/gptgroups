<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $brands = [
                [
                    'name' => 'LAVA',
                    'description' => 'LAVA offers reliable smartphones, feature phones, tablets and mobile accessories.',
                    'categories' => [
                        'Smartphones',
                        'Feature Phones',
                        'Tablets',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'Nothing',
                    'description' => 'Nothing creates innovative smartphones, audio products and connected accessories.',
                    'categories' => [
                        'Smartphones',
                        'Earbuds',
                        'Chargers',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'EZVIZ',
                    'description' => 'EZVIZ provides smart security cameras, video doorbells and connected home solutions.',
                    'categories' => [
                        'Indoor Cameras',
                        'Outdoor Cameras',
                        'Video Doorbells',
                        'Security Accessories',
                    ],
                ],
                [
                    'name' => 'Life Smart',
                    'description' => 'Life Smart delivers intelligent automation products for modern homes and businesses.',
                    'categories' => [
                        'Smart Sensors',
                        'Smart Switches',
                        'Smart Lighting',
                        'Home Automation',
                    ],
                ],
                [
                    'name' => 'Hikvision',
                    'description' => 'Hikvision delivers advanced CCTV, video surveillance and security solutions.',
                    'categories' => [
                        'CCTV Cameras',
                        'Network Recorders',
                        'Access Control',
                        'Security Accessories',
                    ],
                ],
                [
                    'name' => 'Hikvision - Software',
                    'description' => 'Hikvision software provides video management, monitoring and security management solutions.',
                    'categories' => [
                        'Video Management Software',
                        'Mobile Applications',
                        'Cloud Solutions',
                        'Security Management',
                    ],
                ],
                [
                    'name' => 'Samsung',
                    'description' => 'Samsung offers innovative smartphones, tablets, displays and connected devices.',
                    'categories' => [
                        'Smartphones',
                        'Tablets',
                        'Smart Watches',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'SanDisk',
                    'description' => 'SanDisk provides dependable storage products for personal and professional use.',
                    'categories' => [
                        'Memory Cards',
                        'USB Flash Drives',
                        'Portable SSD',
                        'Storage Accessories',
                    ],
                ],
                [
                    'name' => 'UGREEN',
                    'description' => 'UGREEN provides charging, connectivity and digital accessories for modern devices.',
                    'categories' => [
                        'Chargers',
                        'Cables',
                        'Hubs and Adapters',
                        'Power Accessories',
                    ],
                ],
                [
                    'name' => 'VIVO',
                    'description' => 'VIVO offers stylish smartphones, smart devices and mobile accessories.',
                    'categories' => [
                        'Smartphones',
                        'Earbuds',
                        'Smart Watches',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'Yasmina',
                    'description' => 'Yasmina offers smart lifestyle, connectivity and personal technology products.',
                    'categories' => [
                        'Smart Speakers',
                        'Smart Home Devices',
                        'Audio Products',
                        'Lifestyle Accessories',
                    ],
                ],
                [
                    'name' => 'Anker',
                    'description' => 'Anker develops trusted charging, power, audio and smart technology products.',
                    'categories' => [
                        'Power Banks',
                        'Chargers',
                        'Cables',
                        'Audio Accessories',
                    ],
                ],
                [
                    'name' => 'Logitech',
                    'description' => 'Logitech provides computer peripherals, video collaboration and gaming accessories.',
                    'categories' => [
                        'Keyboards',
                        'Computer Mouse',
                        'Webcams',
                        'Gaming Accessories',
                    ],
                ],
                [
                    'name' => 'Redmi',
                    'description' => 'Redmi provides value-focused smartphones, tablets and smart accessories.',
                    'categories' => [
                        'Smartphones',
                        'Tablets',
                        'Smart Watches',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'Xiaomi',
                    'description' => 'Xiaomi offers smartphones, smart home products and connected lifestyle devices.',
                    'categories' => [
                        'Smartphones',
                        'Smart Home',
                        'Wearables',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'Nokia',
                    'description' => 'Nokia offers dependable mobile phones, smartphones and communication devices.',
                    'categories' => [
                        'Smartphones',
                        'Feature Phones',
                        'Tablets',
                        'Mobile Accessories',
                    ],
                ],
                [
                    'name' => 'Romoss',
                    'description' => 'Romoss provides portable charging and power solutions for mobile devices.',
                    'categories' => [
                        'Power Banks',
                        'Wall Chargers',
                        'Charging Cables',
                        'Power Accessories',
                    ],
                ],
                [
                    'name' => 'LG',
                    'description' => 'LG provides displays, home entertainment and smart electronic products.',
                    'categories' => [
                        'Monitors',
                        'Smart TVs',
                        'Audio Products',
                        'Display Accessories',
                    ],
                ],
                [
                    'name' => 'Lifes Smart',
                    'description' => 'Lifes Smart provides connected home automation and intelligent lifestyle solutions.',
                    'categories' => [
                        'Smart Sensors',
                        'Smart Controllers',
                        'Smart Lighting',
                        'Automation Accessories',
                    ],
                ],
            ];

            foreach ($brands as $brandIndex => $brandData) {

                $brandSlug = Str::slug($brandData['name']);

                DB::table('product_brands')->updateOrInsert(
                    ['slug' => $brandSlug],
                    [
                        'name' => $brandData['name'],
                        'description' => $brandData['description'],
                        'logo' => null,
                        'banner_image' => null,
                        'status' => 1,
                        'sort_order' => $brandIndex + 1,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );

                $brandId = DB::table('product_brands')
                    ->where('slug', $brandSlug)
                    ->value('id');

                foreach ($brandData['categories'] as $categoryIndex => $categoryName) {

                    /*
                     * Category slug globally unique है।
                     * इसलिए brand slug category slug के साथ जोड़ा गया है।
                     */
                    $categorySlug = Str::slug(
                        $brandData['name'] . '-' . $categoryName
                    );

                    DB::table('product_categories')->updateOrInsert(
                        ['slug' => $categorySlug],
                        [
                            'product_brand_id' => $brandId,
                            'name' => $categoryName,
                            'description' => $this->categoryDescription(
                                $brandData['name'],
                                $categoryName
                            ),
                            'image' => null,
                            'status' => 1,
                            'sort_order' => $categoryIndex + 1,
                            'updated_at' => now(),
                            'created_at' => now(),
                        ]
                    );

                    $categoryId = DB::table('product_categories')
                        ->where('slug', $categorySlug)
                        ->value('id');

                    $products = $this->generateProducts(
                        brandName: $brandData['name'],
                        brandSlug: $brandSlug,
                        categoryName: $categoryName,
                        categorySlug: $categorySlug,
                        brandPosition: $brandIndex + 1,
                        categoryPosition: $categoryIndex + 1
                    );

                    foreach ($products as $productIndex => $product) {

                        DB::table('products')->updateOrInsert(
                            ['slug' => $product['slug']],
                            [
                                'product_brand_id' => $brandId,
                                'product_category_id' => $categoryId,
                                'name' => $product['name'],
                                'model_no' => $product['model_no'],
                                'sku' => $product['sku'],
                                'badge' => $product['badge'],
                                'product_type' => $product['product_type'],
                                'short_description' => $product['short_description'],
                                'description' => $product['description'],
                                'image' => null,
                                'gallery' => json_encode([]),
                                'tags' => json_encode($product['tags']),
                                'specifications' => json_encode(
                                    $product['specifications']
                                ),
                                'launch_date' => $product['launch_date'],
                                'is_featured' => $product['is_featured'],
                                'status' => 1,
                                'sort_order' => $productIndex + 1,
                                'updated_at' => now(),
                                'created_at' => now(),
                            ]
                        );
                    }
                }
            }
        });
    }

    /**
     * हर category में 5 products बनाएगा।
     */
    private function generateProducts(
        string $brandName,
        string $brandSlug,
        string $categoryName,
        string $categorySlug,
        int $brandPosition,
        int $categoryPosition
    ): array {
        $productTemplates = [
            [
                'series' => 'Essential',
                'badge' => 'Latest',
                'product_type' => 'latest',
                'launch_date' => Carbon::now()
                    ->subDays(20)
                    ->toDateString(),
                'is_featured' => 1,
            ],
            [
                'series' => 'Advanced',
                'badge' => 'Latest',
                'product_type' => 'latest',
                'launch_date' => Carbon::now()
                    ->subDays(10)
                    ->toDateString(),
                'is_featured' => 1,
            ],
            [
                'series' => 'Pro',
                'badge' => 'New',
                'product_type' => 'latest',
                'launch_date' => Carbon::now()
                    ->subDays(3)
                    ->toDateString(),
                'is_featured' => 0,
            ],
            [
                'series' => 'Next',
                'badge' => 'Upcoming',
                'product_type' => 'upcoming',
                'launch_date' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'is_featured' => 1,
            ],
            [
                'series' => 'Classic',
                'badge' => null,
                'product_type' => 'normal',
                'launch_date' => Carbon::now()
                    ->subMonths(4)
                    ->toDateString(),
                'is_featured' => 0,
            ],
        ];

        $products = [];

        foreach ($productTemplates as $index => $template) {

            $number = $index + 1;

            $productName = sprintf(
                '%s %s %s %02d',
                $brandName,
                $categoryName,
                $template['series'],
                $number
            );

            $productSlug = Str::slug(
                $brandSlug . '-' .
                $categorySlug . '-' .
                $template['series'] . '-' .
                $number
            );

            $modelNo = strtoupper(
                Str::substr(
                    preg_replace('/[^A-Za-z0-9]/', '', $brandName),
                    0,
                    3
                )
            ) . '-' .
                str_pad((string) $categoryPosition, 2, '0', STR_PAD_LEFT) .
                str_pad((string) $number, 2, '0', STR_PAD_LEFT);

            $sku = strtoupper(
                Str::substr(
                    preg_replace('/[^A-Za-z0-9]/', '', $brandName),
                    0,
                    4
                )
            ) . '-' .
                str_pad((string) $brandPosition, 2, '0', STR_PAD_LEFT) . '-' .
                str_pad((string) $categoryPosition, 2, '0', STR_PAD_LEFT) . '-' .
                str_pad((string) $number, 2, '0', STR_PAD_LEFT);

            $products[] = [
                'name' => $productName,
                'slug' => $productSlug,
                'model_no' => $modelNo,
                'sku' => $sku,
                'badge' => $template['badge'],
                'product_type' => $template['product_type'],

                'short_description' => sprintf(
                    '%s %s product designed for reliable performance and modern business requirements.',
                    $brandName,
                    $categoryName
                ),

                'description' => sprintf(
                    '%s is a %s product from %s. It is suitable for retail customers, business buyers and distribution partners. This demo product can be updated from the admin panel with its original model number, images, specifications and launch information.',
                    $productName,
                    $categoryName,
                    $brandName
                ),

                'tags' => array_values(array_filter([
                    $brandName,
                    $categoryName,
                    $template['badge'],
                    'Retail',
                    'B2B',
                ])),

                'specifications' => [
                    'Brand' => $brandName,
                    'Category' => $categoryName,
                    'Series' => $template['series'],
                    'Model Number' => $modelNo,
                    'Availability' => $template['product_type'] === 'upcoming'
                        ? 'Coming Soon'
                        : 'Available',
                    'Warranty' => 'Standard Manufacturer Warranty',
                ],

                'launch_date' => $template['launch_date'],
                'is_featured' => $template['is_featured'],
            ];
        }

        return $products;
    }

    private function categoryDescription(
        string $brandName,
        string $categoryName
    ): string {
        return sprintf(
            'Explore %s %s products, latest launches, upcoming models and solutions for retail and business customers.',
            $brandName,
            $categoryName
        );
    }
}