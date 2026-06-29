<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use App\Models\NewsPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    //php artisan db:seed --class=NewsSeeder
    public function run(): void
    {
        $categories = [
            ['name' => 'Product Launch', 'theme' => 'blue'],
            ['name' => 'Offers', 'theme' => 'cyan'],
            ['name' => 'Training', 'theme' => 'blue'],
            ['name' => 'Retail Event', 'theme' => 'cyan'],
            ['name' => 'Distribution', 'theme' => 'blue'],
            ['name' => 'Service', 'theme' => 'cyan'],
        ];

        foreach ($categories as $index => $category) {
            NewsCategory::firstOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'theme' => $category['theme'],
                    'sort_order' => $index,
                    'status' => 1,
                ]
            );
        }

        $productLaunch = NewsCategory::where('slug', 'product-launch')->first();
        $offers = NewsCategory::where('slug', 'offers')->first();
        $training = NewsCategory::where('slug', 'training')->first();

        $posts = [
            [
                'category' => $productLaunch,
                'small_title' => 'New Product Update',
                'title' => 'New mobile products and accessories coming to retail channels.',
                'excerpt' => 'Use this card to publish new smartphone, tablet, watch and accessory launch announcements.',
                'content' => 'Detailed product launch information will appear here. You can write complete news, launch details, specifications, partner updates and more.',
            ],
            [
                'category' => $offers,
                'small_title' => 'Retail Offer',
                'title' => 'Special retail offers for customers and partner stores.',
                'excerpt' => 'Add seasonal offers, bundle discounts, accessories deals and showroom promotions here.',
                'content' => 'Detailed offer information will appear here. Add offer terms, dates, product details and customer instructions.',
            ],
            [
                'category' => $training,
                'small_title' => 'Partner Training',
                'title' => 'Product knowledge and sales training for retail partners.',
                'excerpt' => 'Publish dealer training updates, product demo events and sales enablement programs.',
                'content' => 'Detailed training information will appear here. Add schedule, venue, training agenda and partner notes.',
            ],
        ];

        foreach ($posts as $index => $post) {
            NewsPost::firstOrCreate(
                ['slug' => Str::slug($post['title'])],
                [
                    'news_category_id' => $post['category']?->id,
                    'small_title' => $post['small_title'],
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'],
                    'content' => $post['content'],
                    'published_date' => now()->subDays($index),
                    'sort_order' => $index,
                    'status' => 1,
                ]
            );
        }
    }
}