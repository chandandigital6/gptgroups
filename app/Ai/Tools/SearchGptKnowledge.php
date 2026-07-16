<?php

namespace App\Ai\Tools;

use App\Models\AiKnowledgeDocument;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class SearchGptKnowledge implements Tool
{
    public function __construct(
        private readonly string $language = 'en'
    ) {
    }

    public function description(): Stringable|string
    {
        return 'Search official GPT Group knowledge including company details, business verticals, products, brands, services, Oman network, retail outlets, careers, news, FAQs and contact information. Always use this tool before answering company-specific questions.';
    }

    public function handle(Request $request): Stringable|string
    {
        $search = trim((string) ($request['query'] ?? ''));

        if ($search === '') {
            return json_encode([
                'success' => false,
                'message' => 'A search query is required.',
                'documents' => [],
            ], JSON_UNESCAPED_UNICODE);
        }

        $limit = min(
            max((int) ($request['limit'] ?? 5), 1),
            8
        );

        $type = trim((string) ($request['type'] ?? ''));

        $words = collect(
            preg_split(
                '/\s+/u',
                mb_strtolower($search)
            )
        )
            ->map(fn ($word) => trim(
                $word,
                " \t\n\r\0\x0B,.!?;:'\"()[]{}"
            ))
            ->filter(fn ($word) => mb_strlen($word) >= 2)
            ->unique()
            ->take(12)
            ->values();

        $query = AiKnowledgeDocument::query()
            ->active()
            ->forLanguage($this->language);

        if ($type !== '') {
            $query->where('type', $type);
        }

        $query->where(function ($query) use ($search, $words) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('summary', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");

            foreach ($words as $word) {
                $query->orWhere('title', 'like', "%{$word}%")
                    ->orWhere('summary', 'like', "%{$word}%")
                    ->orWhere('content', 'like', "%{$word}%")
                    ->orWhere('keywords', 'like', "%{$word}%");
            }
        });

        $documents = $query
            ->orderByDesc('priority')
            ->orderByDesc('is_synced')
            ->orderByDesc('updated_at')
            ->limit($limit)
            ->get()
            ->map(function (AiKnowledgeDocument $document) {
                return [
                    'title' => $document->title,
                    'type' => $document->type,
                    'summary' => $document->summary,
                    'content' => mb_substr(
                        trim(strip_tags($document->content)),
                        0,
                        6000
                    ),
                    'source_url' => $document->source_url,
                    'language' => $document->language,
                ];
            })
            ->values()
            ->all();

        return json_encode([
            'success' => true,
            'query' => $search,
            'count' => count($documents),
            'documents' => $documents,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'query' => $schema
                ->string()
                ->description(
                    'Visitor question or relevant search keywords.'
                )
                ->required(),

            'type' => $schema
                ->string()
                ->description(
                    'Optional document type such as company, product, business_vertical, network, career, news, faq or contact.'
                ),

            'limit' => $schema
                ->integer()
                ->min(1)
                ->max(8)
                ->description(
                    'Maximum documents to return.'
                ),
        ];
    }
}