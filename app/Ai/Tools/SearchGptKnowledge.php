<?php

namespace App\Ai\Tools;

use App\Models\AiKnowledge;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchGptKnowledge implements Tool
{
    public function __construct(
        private readonly string $language = 'en'
    ) {
    }

    /**
     * Tool name visible to the AI model.
     */
    public function name(): string
    {
        return 'search_gpt_knowledge';
    }

    /**
     * Tool description.
     */
    public function description(): Stringable|string
    {
        return 'Search the official GPT Group knowledge base for accurate information about the company, services, products, brands, business verticals, careers, contacts, locations, network, partnerships and related topics.';
    }

    /**
     * Parameters accepted by this tool.
     */
    public function schema(
        JsonSchema $schema
    ): array {
        return [
            'query' => $schema
                ->string()
                ->description(
                    'The visitor question or the specific GPT Group topic to search for.'
                )
                ->required(),
        ];
    }

    /**
     * Execute the knowledge search.
     */
    public function handle(
        Request $request
    ): Stringable|string {
        try {
            $query = trim(
                (string) ($request['query'] ?? '')
            );

            if ($query === '') {
                return json_encode([
                    'success' => false,
                    'message' =>
                        'No search query was provided.',
                    'results' => [],
                ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }

            /*
            |--------------------------------------------------------------------------
            | Search official knowledge
            |--------------------------------------------------------------------------
            |
            | Update the model and fields below according to your actual table.
            |
            */

            $results = AiKnowledge::query()
                ->where('status', true)
                ->where(function ($builder) use ($query) {
                    $builder
                        ->where(
                            'title',
                            'like',
                            '%' . $query . '%'
                        )
                        ->orWhere(
                            'content',
                            'like',
                            '%' . $query . '%'
                        )
                        ->orWhere(
                            'keywords',
                            'like',
                            '%' . $query . '%'
                        );
                })
                ->orderByDesc('updated_at')
                ->limit(8)
                ->get([
                    'title',
                    'content',
                    'category',
                    'page_url',
                ]);

            /*
            |--------------------------------------------------------------------------
            | Try a broad word search when exact sentence returns nothing
            |--------------------------------------------------------------------------
            */

            if ($results->isEmpty()) {
                $words = collect(
                    preg_split(
                        '/\s+/u',
                        mb_strtolower($query)
                    )
                )
                    ->map(
                        fn ($word) => trim(
                            $word,
                            " \t\n\r\0\x0B.,!?;:\"'()[]{}"
                        )
                    )
                    ->filter(
                        fn ($word) =>
                            mb_strlen($word) >= 3
                    )
                    ->unique()
                    ->take(8)
                    ->values();

                if ($words->isNotEmpty()) {
                    $results = AiKnowledge::query()
                        ->where('status', true)
                        ->where(function ($builder) use ($words) {
                            foreach ($words as $word) {
                                $builder->orWhere(
                                    function ($queryBuilder) use ($word) {
                                        $queryBuilder
                                            ->where(
                                                'title',
                                                'like',
                                                '%' . $word . '%'
                                            )
                                            ->orWhere(
                                                'content',
                                                'like',
                                                '%' . $word . '%'
                                            )
                                            ->orWhere(
                                                'keywords',
                                                'like',
                                                '%' . $word . '%'
                                            );
                                    }
                                );
                            }
                        })
                        ->orderByDesc('updated_at')
                        ->limit(8)
                        ->get([
                            'title',
                            'content',
                            'category',
                            'page_url',
                        ]);
                }
            }

            if ($results->isEmpty()) {
                return json_encode([
                    'success' => true,
                    'found' => false,
                    'query' => $query,
                    'message' =>
                        'No relevant information was found in the official GPT Group knowledge base.',
                    'results' => [],
                ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }

            $formattedResults = $results
                ->map(function ($item, int $index) {
                    return [
                        'result_number' => $index + 1,
                        'title' => trim(
                            (string) $item->title
                        ),
                        'category' => trim(
                            (string) ($item->category ?? '')
                        ),
                        'content' => trim(
                            strip_tags(
                                (string) $item->content
                            )
                        ),
                        'page_url' =>
                            $item->page_url ?: null,
                    ];
                })
                ->values()
                ->all();

            /*
            |--------------------------------------------------------------------------
            | Important: always return a string
            |--------------------------------------------------------------------------
            */

            return json_encode([
                'success' => true,
                'found' => true,
                'query' => $query,
                'language' => $this->language,
                'result_count' =>
                    count($formattedResults),
                'results' => $formattedResults,
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        } catch (Throwable $exception) {
            Log::error(
                'SearchGptKnowledge tool failed.',
                [
                    'message' =>
                        $exception->getMessage(),
                    'file' =>
                        $exception->getFile(),
                    'line' =>
                        $exception->getLine(),
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Never allow the tool to end without output
            |--------------------------------------------------------------------------
            */

            return json_encode([
                'success' => false,
                'found' => false,
                'message' =>
                    'The official GPT Group knowledge base could not be searched at this time.',
                'results' => [],
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}