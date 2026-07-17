<?php

namespace App\Console\Commands;

use App\Models\AiKnowledgeDocument;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class SyncWebsiteKnowledge extends Command
{
    /**
     * Artisan command signature.
     */
    protected $signature = 'ai:sync-website
                            {--url= : Website base URL}
                            {--limit=150 : Maximum pages to crawl}
                            {--fresh : Delete old website-synced knowledge first}
                            {--insecure : Disable SSL certificate verification}
                            {--language=en : Content language}';

    /**
     * Command description.
     */
    protected $description =
        'Read public GPT Group website pages and sync them into AI knowledge documents';

    /**
     * Website base URL.
     */
    private string $baseUrl = '';

    /**
     * Website hostname.
     */
    private string $baseHost = '';

    /**
     * Maximum pages to read.
     */
    private int $pageLimit = 150;

    /**
     * Current document language.
     */
    private string $language = 'en';

    /**
     * Already visited URLs.
     *
     * @var array<string, bool>
     */
    private array $visitedUrls = [];

    /**
     * URLs waiting to be processed.
     *
     * @var array<int, string>
     */
    private array $pendingUrls = [];

    /**
     * Run command.
     */
    public function handle(): int
    {
        try {
            $this->prepareConfiguration();

            $this->newLine();

            $this->info(
                'GPT Group website knowledge sync started.'
            );

            $this->line(
                'Website: ' . $this->baseUrl
            );

            $this->line(
                'Maximum pages: ' . $this->pageLimit
            );

            $this->line(
                'Language: ' . $this->language
            );

            /*
            |--------------------------------------------------------------------------
            | Delete previous website documents
            |--------------------------------------------------------------------------
            */

            if ((bool) $this->option('fresh')) {
                $this->deleteOldWebsiteDocuments();
            }

            /*
            |--------------------------------------------------------------------------
            | Add home page
            |--------------------------------------------------------------------------
            */

            $this->addPendingUrl(
                $this->baseUrl
            );

            /*
            |--------------------------------------------------------------------------
            | Add URLs from sitemap
            |--------------------------------------------------------------------------
            */

            $this->loadSitemapUrls();

            $processed = 0;
            $saved = 0;
            $skipped = 0;
            $failed = 0;

            /*
            |--------------------------------------------------------------------------
            | Crawl pages
            |--------------------------------------------------------------------------
            */

            while (
                !empty($this->pendingUrls)
                && $processed < $this->pageLimit
            ) {
                $url = array_shift(
                    $this->pendingUrls
                );

                if (!$url) {
                    continue;
                }

                $url = $this->normalizeUrl(
                    $url
                );

                if (!$url) {
                    $skipped++;

                    continue;
                }

                if (
                    isset(
                        $this->visitedUrls[$url]
                    )
                ) {
                    continue;
                }

                $this->visitedUrls[$url] = true;

                if (!$this->shouldCrawl($url)) {
                    $skipped++;

                    continue;
                }

                $processed++;

                $this->newLine();

                $this->line(
                    "[{$processed}/{$this->pageLimit}] {$url}"
                );

                try {
                    $wasSaved = $this->syncPage(
                        $url
                    );

                    if ($wasSaved) {
                        $saved++;

                        $this->info(
                            'Saved successfully.'
                        );
                    } else {
                        $skipped++;

                        $this->warn(
                            'Skipped: useful content not found.'
                        );
                    }
                } catch (Throwable $exception) {
                    $failed++;

                    $this->error(
                        'Failed: ' .
                        $exception->getMessage()
                    );

                    Log::warning(
                        'Website knowledge page sync failed.',
                        [
                            'url' => $url,
                            'message' =>
                                $exception->getMessage(),
                            'file' =>
                                $exception->getFile(),
                            'line' =>
                                $exception->getLine(),
                        ]
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Result
            |--------------------------------------------------------------------------
            */

            $this->newLine(2);

            $this->info(
                'Website knowledge sync completed.'
            );

            $this->table(
                [
                    'Metric',
                    'Count',
                ],
                [
                    [
                        'Pages processed',
                        $processed,
                    ],
                    [
                        'Documents saved',
                        $saved,
                    ],
                    [
                        'Pages skipped',
                        $skipped,
                    ],
                    [
                        'Pages failed',
                        $failed,
                    ],
                    [
                        'Total knowledge documents',
                        AiKnowledgeDocument::query()
                            ->count(),
                    ],
                ]
            );

            return self::SUCCESS;
        } catch (Throwable $exception) {
            Log::error(
                'Website knowledge sync command failed.',
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

            $this->newLine();

            $this->error(
                'Website sync failed.'
            );

            $this->error(
                $exception->getMessage()
            );

            return self::FAILURE;
        }
    }

    /**
     * Prepare command settings.
     */
    private function prepareConfiguration(): void
    {
        $configuredUrl = trim(
            (string) (
                $this->option('url')
                ?: config(
                    'services.gpt_website.url'
                )
            )
        );

        if ($configuredUrl === '') {
            throw new RuntimeException(
                'Website URL missing. Add GPT_WEBSITE_URL in .env.'
            );
        }

        if (
            !Str::startsWith(
                $configuredUrl,
                [
                    'http://',
                    'https://',
                ]
            )
        ) {
            $configuredUrl =
                'https://' . $configuredUrl;
        }

        $normalizedBaseUrl =
            $this->normalizeUrl(
                $configuredUrl
            );

        if (!$normalizedBaseUrl) {
            throw new RuntimeException(
                'Invalid website URL: ' .
                $configuredUrl
            );
        }

        $this->baseUrl = rtrim(
            $normalizedBaseUrl,
            '/'
        );

        $this->baseHost = strtolower(
            (string) parse_url(
                $this->baseUrl,
                PHP_URL_HOST
            )
        );

        if ($this->baseHost === '') {
            throw new RuntimeException(
                'Website hostname could not be detected.'
            );
        }

        $this->pageLimit = max(
            1,
            min(
                1000,
                (int) $this->option('limit')
            )
        );

        $this->language = strtolower(
            trim(
                (string) $this->option(
                    'language'
                )
            )
        );

        if ($this->language === '') {
            $this->language = 'en';
        }
    }

    /**
     * Delete old website-generated knowledge.
     */
    private function deleteOldWebsiteDocuments(): void
    {
        $count = AiKnowledgeDocument::withTrashed()
            ->where(
                'source_type',
                'website'
            )
            ->count();

        AiKnowledgeDocument::withTrashed()
            ->where(
                'source_type',
                'website'
            )
            ->forceDelete();

        $this->warn(
            "{$count} old website documents deleted."
        );
    }

    /**
     * Sync one website page.
     */
    private function syncPage(
        string $url
    ): bool {
        $response = $this->fetchUrl(
            $url
        );

        if (!$response->successful()) {
            throw new RuntimeException(
                'HTTP status: ' .
                $response->status()
            );
        }

        $contentType = strtolower(
            (string) $response->header(
                'Content-Type'
            )
        );

        if (
            $contentType !== ''
            && !str_contains(
                $contentType,
                'text/html'
            )
            && !str_contains(
                $contentType,
                'application/xhtml+xml'
            )
        ) {
            return false;
        }

        $html = trim(
            $response->body()
        );

        if ($html === '') {
            return false;
        }

        $document = $this->parseHtml(
            $html
        );

        /*
        |--------------------------------------------------------------------------
        | Find more internal links before removing navigation
        |--------------------------------------------------------------------------
        */

        $this->discoverInternalLinks(
            document: $document,
            currentUrl: $url
        );

        /*
        |--------------------------------------------------------------------------
        | Extract knowledge content
        |--------------------------------------------------------------------------
        */

        $pageData = $this->extractPageData(
            document: $document,
            url: $url
        );

        if (
            mb_strlen(
                $pageData['content']
            ) < 100
        ) {
            return false;
        }

        $slug = $this->makeDocumentSlug(
            $url
        );

        $knowledge =
            AiKnowledgeDocument::withTrashed()
                ->where(
                    'slug',
                    $slug
                )
                ->first();

        if (!$knowledge) {
            $knowledge =
                new AiKnowledgeDocument();

            $knowledge->slug =
                $slug;
        }

        if (
            method_exists(
                $knowledge,
                'trashed'
            )
            && $knowledge->trashed()
        ) {
            $knowledge->restore();
        }

        $knowledge->fill([
            'title' =>
                $pageData['title'],

            'type' =>
                $this->detectDocumentType(
                    url: $url,
                    title:
                        $pageData['title']
                ),

            'source_type' =>
                'website',

            'source_id' =>
                null,

            'source_url' =>
                $url,

            'language' =>
                $this->language,

            'summary' =>
                $pageData['summary'],

            'content' =>
                $pageData['content'],

            'keywords' =>
                $pageData['keywords'],

            'metadata' => [
                'meta_description' =>
                    $pageData[
                        'meta_description'
                    ],

                'headings' =>
                    $pageData['headings'],

                'content_length' =>
                    mb_strlen(
                        $pageData['content']
                    ),

                'synced_by' =>
                    'ai:sync-website',

                'synced_from' =>
                    $url,
            ],

            'priority' =>
                $this->detectPriority(
                    $url
                ),

            'is_active' =>
                true,

            'is_synced' =>
                true,

            'last_synced_at' =>
                now(),
        ]);

        $knowledge->save();

        return true;
    }

    /**
     * Create configured HTTP client.
     */
    private function httpClient(): PendingRequest
    {
        $request = Http::timeout(40)
            ->connectTimeout(15)
            ->retry(
                times: 2,
                sleepMilliseconds: 1000,
                throw: false
            )
            ->withHeaders([
                'User-Agent' =>
                    'GPTGroupKnowledgeSync/1.0',

                'Accept' =>
                    'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',

                'Accept-Language' =>
                    'en-US,en;q=0.9',
            ]);

        if (
            (bool) $this->option(
                'insecure'
            )
        ) {
            $request =
                $request->withoutVerifying();
        }

        return $request;
    }

    /**
     * Request page.
     */
    private function fetchUrl(
        string $url
    ): Response {
        return $this->httpClient()
            ->get($url);
    }

    /**
     * Convert HTML string into DOMDocument.
     */
    private function parseHtml(
        string $html
    ): DOMDocument {
        $document = new DOMDocument(
            '1.0',
            'UTF-8'
        );

        $previousState =
            libxml_use_internal_errors(
                true
            );

        $document->loadHTML(
            '<?xml encoding="UTF-8">' .
            $html,
            LIBXML_NOERROR |
            LIBXML_NOWARNING |
            LIBXML_NONET |
            LIBXML_COMPACT
        );

        libxml_clear_errors();

        libxml_use_internal_errors(
            $previousState
        );

        return $document;
    }

    /**
     * Extract useful information from page.
     *
     * @return array{
     *     title: string,
     *     summary: string,
     *     content: string,
     *     keywords: array<int, string>,
     *     meta_description: string|null,
     *     headings: array<int, string>
     * }
     */
    private function extractPageData(
        DOMDocument $document,
        string $url
    ): array {
        $xpath = new DOMXPath(
            $document
        );

        /*
        |--------------------------------------------------------------------------
        | Remove unwanted content
        |--------------------------------------------------------------------------
        */

        $this->removeUnwantedElements(
            $xpath
        );

        /*
        |--------------------------------------------------------------------------
        | Page title
        |--------------------------------------------------------------------------
        */

        $title = $this->firstText(
            $xpath,
            '//h1'
        );

        if ($title === '') {
            $title = $this->firstText(
                $xpath,
                '//title'
            );
        }

        if ($title === '') {
            $title = $this->titleFromUrl(
                $url
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Meta details
        |--------------------------------------------------------------------------
        */

        $metaDescription =
            $this->extractMetaContent(
                xpath: $xpath,
                name: 'description'
            );

        $metaKeywords =
            $this->extractMetaContent(
                xpath: $xpath,
                name: 'keywords'
            );

        /*
        |--------------------------------------------------------------------------
        | Headings
        |--------------------------------------------------------------------------
        */

        $headings = [];

        $headingNodes = $xpath->query(
            '//h1 | //h2 | //h3 | //h4'
        );

        if ($headingNodes) {
            foreach (
                $headingNodes
                as $headingNode
            ) {
                $heading =
                    $this->cleanText(
                        $headingNode->textContent
                    );

                if ($heading !== '') {
                    $headings[] =
                        $heading;
                }
            }
        }

        $headings = array_values(
            array_unique(
                array_slice(
                    $headings,
                    0,
                    50
                )
            )
        );

        /*
        |--------------------------------------------------------------------------
        | Main page content
        |--------------------------------------------------------------------------
        */

        $contentNode = $xpath->query(
            '//main'
        )?->item(0);

        if (!$contentNode) {
            $contentNode = $xpath->query(
                '//article'
            )?->item(0);
        }

        if (!$contentNode) {
            $contentNode = $xpath->query(
                '//*[@role="main"]'
            )?->item(0);
        }

        if (!$contentNode) {
            $contentNode = $xpath->query(
                '//body'
            )?->item(0);
        }

        $content = '';

        if ($contentNode) {
            $content = $this->cleanText(
                $contentNode->textContent
            );
        }

        $content =
            $this->normalizeContent(
                $content
            );

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $firstParagraph =
            $this->firstMeaningfulParagraph(
                $xpath
            );

        $summaryText = trim(
            implode(
                ' ',
                array_filter([
                    $metaDescription,
                    $firstParagraph,
                    $content,
                ])
            )
        );

        $summary = Str::limit(
            $summaryText,
            700,
            ''
        );

        /*
        |--------------------------------------------------------------------------
        | Keywords
        |--------------------------------------------------------------------------
        */

        $keywords = $this->buildKeywords(
            title: $title,
            metaKeywords:
                $metaKeywords,
            headings: $headings,
            url: $url
        );

        return [
            'title' => Str::limit(
                $title,
                255,
                ''
            ),

            'summary' =>
                $summary,

            'content' =>
                $content,

            'keywords' =>
                $keywords,

            'meta_description' =>
                $metaDescription
                    ?: null,

            'headings' =>
                $headings,
        ];
    }

    /**
     * Remove page elements that should not become knowledge.
     */
    private function removeUnwantedElements(
        DOMXPath $xpath
    ): void {
        $query = implode(
            ' | ',
            [
                '//script',
                '//style',
                '//noscript',
                '//svg',
                '//canvas',
                '//iframe',
                '//form',
                '//button',
                '//nav',
                '//footer',
                '//header',
                '//aside',
                '//*[@aria-hidden="true"]',
                '//*[contains(translate(@class, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz"), "cookie")]',
                '//*[contains(translate(@class, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz"), "modal")]',
                '//*[contains(translate(@class, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz"), "popup")]',
                '//*[contains(translate(@class, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz"), "newsletter")]',
            ]
        );

        $nodes = $xpath->query(
            $query
        );

        if (!$nodes) {
            return;
        }

        $nodesToRemove = [];

        foreach ($nodes as $node) {
            $nodesToRemove[] =
                $node;
        }

        foreach (
            $nodesToRemove
            as $node
        ) {
            if (
                $node instanceof DOMNode
                && $node->parentNode
            ) {
                $node->parentNode
                    ->removeChild($node);
            }
        }
    }

    /**
     * Discover internal website links.
     */
    private function discoverInternalLinks(
        DOMDocument $document,
        string $currentUrl
    ): void {
        $xpath = new DOMXPath(
            $document
        );

        $linkNodes = $xpath->query(
            '//a[@href]'
        );

        if (!$linkNodes) {
            return;
        }

        foreach ($linkNodes as $linkNode) {
            if (
                !$linkNode
                instanceof DOMElement
            ) {
                continue;
            }

            $href = trim(
                $linkNode->getAttribute(
                    'href'
                )
            );

            $resolvedUrl =
                $this->resolveUrl(
                    currentUrl:
                        $currentUrl,
                    href: $href
                );

            if (!$resolvedUrl) {
                continue;
            }

            $this->addPendingUrl(
                $resolvedUrl
            );
        }
    }

    /**
     * Read sitemap and sitemap indexes.
     */
    private function loadSitemapUrls(): void
    {
        $possibleSitemaps = [
            $this->baseUrl .
                '/sitemap.xml',

            $this->baseUrl .
                '/sitemap_index.xml',
        ];

        $readSitemaps = [];

        foreach (
            $possibleSitemaps
            as $sitemapUrl
        ) {
            $this->readSitemap(
                sitemapUrl:
                    $sitemapUrl,
                readSitemaps:
                    $readSitemaps
            );
        }
    }

    /**
     * Read one sitemap.
     *
     * @param array<string, bool> $readSitemaps
     */
    private function readSitemap(
        string $sitemapUrl,
        array &$readSitemaps
    ): void {
        $sitemapUrl =
            $this->normalizeUrl(
                $sitemapUrl
            );

        if (
            !$sitemapUrl
            || isset(
                $readSitemaps[
                    $sitemapUrl
                ]
            )
        ) {
            return;
        }

        $readSitemaps[$sitemapUrl] =
            true;

        try {
            $response =
                $this->httpClient()
                    ->get($sitemapUrl);

            if (!$response->successful()) {
                return;
            }

            $xml = trim(
                $response->body()
            );

            if ($xml === '') {
                return;
            }

            preg_match_all(
                '/<loc>\s*(.*?)\s*<\/loc>/is',
                $xml,
                $matches
            );

            foreach (
                $matches[1] ?? []
                as $location
            ) {
                $location =
                    html_entity_decode(
                        trim($location),
                        ENT_QUOTES |
                        ENT_HTML5,
                        'UTF-8'
                    );

                if ($location === '') {
                    continue;
                }

                if (
                    str_ends_with(
                        strtolower(
                            parse_url(
                                $location,
                                PHP_URL_PATH
                            ) ?: ''
                        ),
                        '.xml'
                    )
                ) {
                    $this->readSitemap(
                        sitemapUrl:
                            $location,
                        readSitemaps:
                            $readSitemaps
                    );

                    continue;
                }

                $this->addPendingUrl(
                    $location
                );
            }
        } catch (Throwable $exception) {
            Log::info(
                'Sitemap could not be read.',
                [
                    'url' =>
                        $sitemapUrl,

                    'message' =>
                        $exception->getMessage(),
                ]
            );
        }
    }

    /**
     * Add URL to pending queue.
     */
    private function addPendingUrl(
        string $url
    ): void {
        $normalizedUrl =
            $this->normalizeUrl(
                $url
            );

        if (!$normalizedUrl) {
            return;
        }

        if (
            isset(
                $this->visitedUrls[
                    $normalizedUrl
                ]
            )
        ) {
            return;
        }

        if (
            !$this->shouldCrawl(
                $normalizedUrl
            )
        ) {
            return;
        }

        if (
            in_array(
                $normalizedUrl,
                $this->pendingUrls,
                true
            )
        ) {
            return;
        }

        $this->pendingUrls[] =
            $normalizedUrl;
    }

    /**
     * Resolve relative URL into absolute URL.
     */
    private function resolveUrl(
        string $currentUrl,
        string $href
    ): ?string {
        $href = trim(
            html_entity_decode(
                $href,
                ENT_QUOTES |
                ENT_HTML5,
                'UTF-8'
            )
        );

        if ($href === '') {
            return null;
        }

        if (
            Str::startsWith(
                strtolower($href),
                [
                    '#',
                    'mailto:',
                    'tel:',
                    'javascript:',
                    'data:',
                    'whatsapp:',
                ]
            )
        ) {
            return null;
        }

        if (
            Str::startsWith(
                $href,
                [
                    'http://',
                    'https://',
                ]
            )
        ) {
            return $this->normalizeUrl(
                $href
            );
        }

        if (
            Str::startsWith(
                $href,
                '//'
            )
        ) {
            $scheme = parse_url(
                $currentUrl,
                PHP_URL_SCHEME
            ) ?: 'https';

            return $this->normalizeUrl(
                $scheme . ':' . $href
            );
        }

        $scheme = parse_url(
            $currentUrl,
            PHP_URL_SCHEME
        ) ?: 'https';

        $host = parse_url(
            $currentUrl,
            PHP_URL_HOST
        );

        $port = parse_url(
            $currentUrl,
            PHP_URL_PORT
        );

        if (!$host) {
            return null;
        }

        $origin =
            $scheme .
            '://' .
            $host .
            ($port ? ':' . $port : '');

        if (
            Str::startsWith(
                $href,
                '/'
            )
        ) {
            return $this->normalizeUrl(
                $origin . $href
            );
        }

        $currentPath = parse_url(
            $currentUrl,
            PHP_URL_PATH
        ) ?: '/';

        $directory = dirname(
            $currentPath
        );

        $directory = str_replace(
            '\\',
            '/',
            $directory
        );

        if ($directory === '.') {
            $directory = '';
        }

        return $this->normalizeUrl(
            $origin .
            rtrim($directory, '/') .
            '/' .
            ltrim($href, '/')
        );
    }

    /**
     * Normalize URL and remove query/fragment.
     */
    private function normalizeUrl(
        string $url
    ): ?string {
        $url = trim($url);

        if ($url === '') {
            return null;
        }

        $parts = parse_url(
            $url
        );

        if (!$parts) {
            return null;
        }

        $scheme = strtolower(
            $parts['scheme']
                ?? 'https'
        );

        $host = strtolower(
            $parts['host']
                ?? ''
        );

        if ($host === '') {
            return null;
        }

        $port = isset(
            $parts['port']
        )
            ? ':' . $parts['port']
            : '';

        $path = $parts['path']
            ?? '/';

        $segments = [];

        foreach (
            explode('/', $path)
            as $segment
        ) {
            if (
                $segment === ''
                || $segment === '.'
            ) {
                continue;
            }

            if ($segment === '..') {
                array_pop($segments);

                continue;
            }

            $segments[] =
                $segment;
        }

        $normalizedPath =
            '/' .
            implode(
                '/',
                $segments
            );

        if ($normalizedPath !== '/') {
            $normalizedPath = rtrim(
                $normalizedPath,
                '/'
            );
        }

        return $scheme .
            '://' .
            $host .
            $port .
            $normalizedPath;
    }

    /**
     * Decide whether URL should be crawled.
     */
    private function shouldCrawl(
        string $url
    ): bool {
        $host = strtolower(
            (string) parse_url(
                $url,
                PHP_URL_HOST
            )
        );

        if (
            $this->baseHost !== ''
            && $host !== $this->baseHost
        ) {
            return false;
        }

        $path = strtolower(
            (string) parse_url(
                $url,
                PHP_URL_PATH
            )
        );

        $blockedPrefixes = [
            '/admin',
            '/login',
            '/register',
            '/logout',
            '/dashboard',
            '/api',
            '/storage',
            '/build',
            '/livewire',
            '/password',
            '/email',
            '/cart',
            '/checkout',
            '/payment',
            '/telescope',
            '/horizon',
        ];

        foreach (
            $blockedPrefixes
            as $blockedPrefix
        ) {
            if (
                $path === $blockedPrefix
                || str_starts_with(
                    $path,
                    $blockedPrefix . '/'
                )
            ) {
                return false;
            }
        }

        $blockedExtensions = [
            '.jpg',
            '.jpeg',
            '.png',
            '.gif',
            '.webp',
            '.svg',
            '.ico',
            '.css',
            '.js',
            '.json',
            '.xml',
            '.pdf',
            '.zip',
            '.rar',
            '.mp4',
            '.webm',
            '.mov',
            '.avi',
            '.doc',
            '.docx',
            '.xls',
            '.xlsx',
            '.ppt',
            '.pptx',
        ];

        foreach (
            $blockedExtensions
            as $extension
        ) {
            if (
                str_ends_with(
                    $path,
                    $extension
                )
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Create stable unique database slug.
     */
    private function makeDocumentSlug(
        string $url
    ): string {
        $path = trim(
            (string) parse_url(
                $url,
                PHP_URL_PATH
            ),
            '/'
        );

        $readablePart = $path === ''
            ? 'home'
            : Str::slug(
                str_replace(
                    '/',
                    '-',
                    $path
                )
            );

        $hash = substr(
            sha1($url),
            0,
            10
        );

        return Str::limit(
            'website-' .
            ($readablePart ?: 'page') .
            '-' .
            $hash,
            255,
            ''
        );
    }

    /**
     * Detect document type.
     */
    private function detectDocumentType(
        string $url,
        string $title
    ): string {
        $text = mb_strtolower(
            $url . ' ' . $title
        );

        return match (true) {
            str_contains($text, 'career'),
            str_contains($text, 'job'),
            str_contains($text, 'vacancy') =>
                'career',

            str_contains($text, 'news'),
            str_contains($text, 'update'),
            str_contains($text, 'blog') =>
                'news',

            str_contains($text, 'business-vertical'),
            str_contains($text, 'business vertical') =>
                'business_vertical',

            str_contains($text, 'brand') =>
                'brand',

            str_contains($text, 'product') =>
                'product',

            str_contains($text, 'network') =>
                'network',

            str_contains($text, 'retail'),
            str_contains($text, 'outlet'),
            str_contains($text, 'store') =>
                'retail_outlet',

            str_contains($text, 'service') =>
                'service',

            str_contains($text, 'contact') =>
                'contact',

            str_contains($text, 'faq') =>
                'faq',

            str_contains($text, 'about'),
            str_contains($text, 'company') =>
                'company',

            default =>
                'page',
        };
    }

    /**
     * Set important pages first in search.
     */
    private function detectPriority(
        string $url
    ): int {
        $path = strtolower(
            trim(
                (string) parse_url(
                    $url,
                    PHP_URL_PATH
                ),
                '/'
            )
        );

        if ($path === '') {
            return 100;
        }

        return match (true) {
            str_contains(
                $path,
                'about'
            ) => 95,

            str_contains(
                $path,
                'business-vertical'
            ) => 90,

            str_contains(
                $path,
                'contact'
            ) => 90,

            str_contains(
                $path,
                'network'
            ) => 85,

            str_contains(
                $path,
                'brand'
            ) => 80,

            str_contains(
                $path,
                'career'
            ) => 75,

            str_contains(
                $path,
                'news'
            ) => 60,

            default => 50,
        };
    }

    /**
     * Extract meta tag content.
     */
    private function extractMetaContent(
        DOMXPath $xpath,
        string $name
    ): string {
        $query = sprintf(
            '//meta[
                translate(
                    @name,
                    "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
                    "abcdefghijklmnopqrstuvwxyz"
                )="%s"
            ]/@content',
            strtolower($name)
        );

        $node = $xpath->query(
            $query
        )?->item(0);

        return $node
            ? $this->cleanText(
                $node->nodeValue
            )
            : '';
    }

    /**
     * Get first node text.
     */
    private function firstText(
        DOMXPath $xpath,
        string $query
    ): string {
        $node = $xpath->query(
            $query
        )?->item(0);

        return $node
            ? $this->cleanText(
                $node->textContent
            )
            : '';
    }

    /**
     * Get first meaningful paragraph.
     */
    private function firstMeaningfulParagraph(
        DOMXPath $xpath
    ): string {
        $paragraphs = $xpath->query(
            '//main//p | //article//p | //*[@role="main"]//p | //body//p'
        );

        if (!$paragraphs) {
            return '';
        }

        foreach (
            $paragraphs
            as $paragraph
        ) {
            $text =
                $this->cleanText(
                    $paragraph->textContent
                );

            if (
                mb_strlen($text) >= 40
            ) {
                return $text;
            }
        }

        return '';
    }

    /**
     * Clean extracted text.
     */
    private function cleanText(
        ?string $text
    ): string {
        $text = html_entity_decode(
            (string) $text,
            ENT_QUOTES |
            ENT_HTML5,
            'UTF-8'
        );

        $text = preg_replace(
            '/[\x{00A0}\s]+/u',
            ' ',
            $text
        ) ?? $text;

        return trim($text);
    }

    /**
     * Normalize page content.
     */
    private function normalizeContent(
        string $content
    ): string {
        $content = html_entity_decode(
            $content,
            ENT_QUOTES |
            ENT_HTML5,
            'UTF-8'
        );

        $content = preg_replace(
            '/[ \t]+/u',
            ' ',
            $content
        ) ?? $content;

        $content = preg_replace(
            '/\s*\n\s*/u',
            "\n",
            $content
        ) ?? $content;

        $content = preg_replace(
            '/\n{3,}/u',
            "\n\n",
            $content
        ) ?? $content;

        $content = preg_replace(
            '/\s+/u',
            ' ',
            $content
        ) ?? $content;

        return trim($content);
    }

    /**
     * Build keywords array.
     *
     * @param array<int, string> $headings
     * @return array<int, string>
     */
    private function buildKeywords(
        string $title,
        string $metaKeywords,
        array $headings,
        string $url
    ): array {
        $urlWords = str_replace(
            [
                '-',
                '_',
                '/',
            ],
            ' ',
            (string) parse_url(
                $url,
                PHP_URL_PATH
            )
        );

        $values = [
            'GPT Group',
            'GPT Group Oman',
            $title,
            $metaKeywords,
            $urlWords,
            ...$headings,
        ];

        $keywords = [];

        foreach ($values as $value) {
            $parts = preg_split(
                '/[,|]+/u',
                (string) $value
            ) ?: [];

            foreach ($parts as $part) {
                $part = $this->cleanText(
                    $part
                );

                if (
                    mb_strlen($part) < 2
                ) {
                    continue;
                }

                $normalized =
                    mb_strtolower($part);

                $keywords[$normalized] =
                    $part;
            }
        }

        return array_values(
            array_slice(
                $keywords,
                0,
                60,
                true
            )
        );
    }

    /**
     * Generate page title from URL.
     */
    private function titleFromUrl(
        string $url
    ): string {
        $path = trim(
            (string) parse_url(
                $url,
                PHP_URL_PATH
            ),
            '/'
        );

        if ($path === '') {
            return 'GPT Group';
        }

        return Str::headline(
            str_replace(
                '/',
                ' ',
                $path
            )
        );
    }
}