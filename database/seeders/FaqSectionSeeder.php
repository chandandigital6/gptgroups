<?php

namespace Database\Seeders;

use App\Models\FaqSection;
use Illuminate\Database\Seeder;

class FaqSectionSeeder extends Seeder
{
    // php artisan db:seed --class=FaqSectionSeeder
    public function run(): void
    {
        $faqSection = FaqSection::create([
            'page_slug' => 'home',
            'label' => 'FAQs',
            'title' => 'Frequently asked questions.',
            'description' => 'Useful for brands, dealers, retailers and B2B buyers exploring partnership with GPT Group.',
            'button_text' => 'Ask More Questions',
            'button_link' => '/contact-us',
            'sort_order' => 0,
            'status' => 1,
        ]);

        $faqSection->items()->createMany([
            [
                'question' => 'Which product categories does GPT Group handle?',
                'answer' => 'Mobiles, tablets, watches, accessories and allied technology products, along with diversified verticals such as e-commerce, fashion, beauty and IT services.',
                'sort_order' => 0,
                'is_open' => 1,
                'status' => 1,
            ],
            [
                'question' => 'Does GPT Group support retail partners?',
                'answer' => 'Yes. The company supports retail IRs, wholesale partners, KDR networks and B2B accounts with product availability and launch coordination.',
                'sort_order' => 1,
                'is_open' => 0,
                'status' => 1,
            ],
            [
                'question' => 'Can brands use GPT Group for Oman market expansion?',
                'answer' => 'Yes. GPT Group provides market coverage support across key locations including Muscat, Sur and Salalah.',
                'sort_order' => 2,
                'is_open' => 0,
                'status' => 1,
            ],
            [
                'question' => 'Is the website ready for real enquiries?',
                'answer' => 'The front-end form layout is ready. Connect it with backend email/CRM logic when deploying.',
                'sort_order' => 3,
                'is_open' => 0,
                'status' => 1,
            ],
        ]);
    }
}