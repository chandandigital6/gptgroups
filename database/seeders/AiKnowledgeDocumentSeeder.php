<?php

namespace Database\Seeders;

use App\Models\AiKnowledgeDocument;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AiKnowledgeDocumentSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            [
                'title' => 'About GPT Group',
                'type' => 'company',
                'summary' =>
                    'Official overview of GPT Group in Oman.',
                'content' => <<<'CONTENT'
GPT Group is an Oman-based diversified business group.

Its operations include mobile and consumer electronics,
security solutions, IT infrastructure solutions, trading,
distribution, retail support and B2B services.

Replace this starter content with the final approved company
profile available in the GPT Group website CMS.
CONTENT,
                'keywords' => [
                    'GPT Group',
                    'GPT Group Oman',
                    'company profile',
                    'about company',
                ],
                'source_url' => url('/about'),
                'priority' => 100,
            ],

            [
                'title' => 'GPT Group Business Verticals',
                'type' => 'business_vertical',
                'summary' =>
                    'Core GPT Group business verticals.',
                'content' => <<<'CONTENT'
GPT Group operates through four core business verticals:

1. Mobile and Consumer Electronics
2. Security Solutions
3. IT Infrastructure Solutions
4. Trading and Distribution

Replace this starter content with final approved information
from each business vertical page.
CONTENT,
                'keywords' => [
                    'business verticals',
                    'mobile electronics',
                    'security solutions',
                    'IT infrastructure',
                    'trading distribution',
                ],
                'source_url' =>
                    url('/business-verticals'),
                'priority' => 90,
            ],

            [
                'title' => 'GPT Group Contact Information',
                'type' => 'contact',
                'summary' =>
                    'Official GPT Group contact options.',
                'content' => <<<'CONTENT'
Visitors may use the official GPT Group contact page for
general, partnership, product, support and business enquiries.

Add the final approved phone number, email address and office
details here from the website CMS.
CONTENT,
                'keywords' => [
                    'contact',
                    'phone',
                    'email',
                    'office',
                    'enquiry',
                ],
                'source_url' => url('/contact'),
                'priority' => 100,
            ],
        ];

        foreach ($documents as $document) {
            AiKnowledgeDocument::updateOrCreate(
                [
                    'slug' => Str::slug(
                        $document['title']
                    ) . '-en',
                ],
                [
                    ...$document,
                    'source_type' => 'manual',
                    'language' => 'en',
                    'is_active' => true,
                    'is_synced' => true,
                    'last_synced_at' => now(),
                ]
            );
        }
    }
}