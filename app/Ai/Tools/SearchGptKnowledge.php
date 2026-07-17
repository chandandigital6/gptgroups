<?php

namespace App\Ai\Tools;

use App\Models\AiKnowledgeDocument;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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
     * Tool name visible to model.
     */
    public function name(): string
    {
        return 'search_gpt_knowledge';
    }

    /**
     * Tool purpose.
     */
    public function description(): Stringable|string
    {
        return 'Search the official GPT Group website knowledge base for accurate information about the company, services, products, brands, business verticals, careers, contacts, locations, network, partnerships and related topics.';
    }

    /**
     * Tool input schema.
     */
    public function schema(
        JsonSchema $schema
    ): array {
        return [
            'query' => $schema
                ->string()
                ->description(
                    'Visitor question or specific GPT Group topic to search.'
                )
                ->required(),
        ];
    }

    /**
     * Search knowledge database.
     */
    public function handle(
        Request $request
    ): Stringable|string {
        try {
            $query = trim(
                (string) (
                    $request['query']
                    ?? ''
                )
            );

            if ($query === '') {
                return $this->json([
                    'success' => false,
                    'found' => false,
                    'message' =>
                        'No search query was provided.',
                    'results' => [],
                ]);
            }

            $searchWords =
                $this->extractSearchWords(
                    $query
                );

            $results =
                $this->searchDocuments(
                    originalQuery: $query,
                    searchWords:
                        $searchWords
                );

            if ($results->isEmpty()) {
                return $this->json([
                    'success' => true,
                    'found' => false,
                    'query' => $query,
                    'message' =>
                        'No relevant information was found in the official GPT Group knowledge base.',
                    'results' => [],
                ]);
            }

            $formattedResults =
                $results
                    ->map(function (
                        AiKnowledgeDocument $document,
                        int $index
                    ): array {
                        return [
                            'result_number' =>
                                $index + 1,

                            'title' =>
                                trim(
                                    (string) $document->title
                                ),

                            'type' =>
                                $document->type,

                            'summary' =>
                                trim(
                                    strip_tags(
                                        (string) (
                                            $document->summary
                                            ?: ''
                                        )
                                    )
                                ),

                            'content' =>
                                trim(
                                    strip_tags(
                                        (string) $document->content
                                    )
                                ),

                            'source_url' =>
                                $document->source_url
                                    ?: null,

                            'last_synced_at' =>
                                $document->last_synced_at
                                    ? $document
                                        ->last_synced_at
                                        ->toISOString()
                                    : null,
                        ];
                    })
                    ->values()
                    ->all();

            return $this->json([
                'success' => true,
                'found' => true,
                'query' => $query,
                'language' =>
                    $this->language,
                'result_count' =>
                    count(
                        $formattedResults
                    ),
                'results' =>
                    $formattedResults,
            ]);
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
                    'trace' =>
                        $exception->getTraceAsString(),
                ]
            );

            return $this->json([
                'success' => false,
                'found' => false,
                'message' =>
                    'The official GPT Group knowledge base could not be searched at this time.',
                'results' => [],
            ]);
        }
    }

    /**
     * Search active knowledge documents.
     *
     * @param Collection<int, string> $searchWords
     * @return Collection<int, AiKnowledgeDocument>
     */
    private function searchDocuments(
        string $originalQuery,
        Collection $searchWords
    ): Collection {
        return AiKnowledgeDocument::query()
            ->active()
            ->forLanguage(
                $this->language
            )
            ->where(function (
                Builder $builder
            ) use (
                $originalQuery,
                $searchWords
            ): void {
                /*
                |--------------------------------------------------------------------------
                | Full visitor question
                |--------------------------------------------------------------------------
                */

                $builder
                    ->where(
                        'title',
                        'like',
                        '%' .
                        $originalQuery .
                        '%'
                    )
                    ->orWhere(
                        'summary',
                        'like',
                        '%' .
                        $originalQuery .
                        '%'
                    )
                    ->orWhere(
                        'content',
                        'like',
                        '%' .
                        $originalQuery .
                        '%'
                    )
                    ->orWhere(
                        'keywords',
                        'like',
                        '%' .
                        $originalQuery .
                        '%'
                    );

                /*
                |--------------------------------------------------------------------------
                | Individual important words
                |--------------------------------------------------------------------------
                */

                foreach (
                    $searchWords
                    as $word
                ) {
                    $builder->orWhere(
                        function (
                            Builder $wordQuery
                        ) use ($word): void {
                            $wordQuery
                                ->where(
                                    'title',
                                    'like',
                                    '%' .
                                    $word .
                                    '%'
                                )
                                ->orWhere(
                                    'summary',
                                    'like',
                                    '%' .
                                    $word .
                                    '%'
                                )
                                ->orWhere(
                                    'content',
                                    'like',
                                    '%' .
                                    $word .
                                    '%'
                                )
                                ->orWhere(
                                    'keywords',
                                    'like',
                                    '%' .
                                    $word .
                                    '%'
                                );
                        }
                    );
                }
            })
            ->orderByDesc(
                'priority'
            )
            ->orderByDesc(
                'last_synced_at'
            )
            ->orderByDesc(
                'updated_at'
            )
            ->limit(10)
            ->get();
    }

    /**
     * Extract useful search words.
     *
     * @return Collection<int, string>
     */
    private function extractSearchWords(
        string $query
    ): Collection {
        $stopWords = [
            'what',
            'who',
            'where',
            'when',
            'which',
            'tell',
            'about',
            'please',
            'give',
            'show',
            'does',
            'have',
            'with',
            'from',
            'your',
            'their',
            'this',
            'that',
            'the',
            'and',
            'for',
            'hai',
            'hain',
            'kya',
            'kaun',
            'batao',
            'bataiye',
            'bataye',
            'ke',
            'ki',
            'ka',
            'ko',
            'se',
            'me',
            'mein',
            'aur',
        ];

        return collect(
            preg_split(
                '/[^\p{L}\p{N}]+/u',
                mb_strtolower(
                    $query
                )
            ) ?: []
        )
            ->map(
                fn (
                    string $word
                ): string => trim($word)
            )
            ->filter(
                fn (
                    string $word
                ): bool =>
                    mb_strlen($word) >= 2
                    && !in_array(
                        $word,
                        $stopWords,
                        true
                    )
            )
            ->unique()
            ->take(15)
            ->values();
    }

    /**
     * Always return JSON string.
     */
    private function json(
        array $data
    ): string {
        $json = json_encode(
            $data,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES |
            JSON_INVALID_UTF8_SUBSTITUTE
        );

        if ($json !== false) {
            return $json;
        }

        return '{"success":false,"found":false,"message":"Knowledge result encoding failed.","results":[]}';
    }
}