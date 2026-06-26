<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\FaqSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = FaqSection::query()->withCount('items');

        $search = trim((string) $request->get('search', ''));
        $pageSlug = trim((string) $request->get('page_slug', ''));

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('page_slug', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($pageSlug !== '' && $pageSlug !== 'all') {
            $query->where('page_slug', $pageSlug);
        }

        // Aapke project me paginate issue aa raha tha, isliye get() use kiya hai
        $faqSections = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $stats = [
            'total' => FaqSection::count(),
            'active' => FaqSection::where('status', 1)->count(),
            'items' => FaqItem::count(),
            'pages' => FaqSection::distinct()->count('page_slug'),
        ];

        $pages = $this->pages();

        return view('faq_sections.index', compact('faqSections', 'stats', 'pages'));
    }

    public function create()
    {
        $pages = $this->pages();

        return view('faq_sections.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'page_slug' => $this->resolvePageSlug($request),
        ]);

        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $faqSection = FaqSection::create([
                'page_slug' => $validated['page_slug'],
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->boolean('status'),
            ]);

            $this->saveItems($request, $faqSection);
        });

        return redirect()
            ->route('faq-sections.index')
            ->with('success', 'FAQ section created successfully.');
    }

    public function show(FaqSection $faqSection)
    {
        $faqSection->load('items');

        return view('faq_sections.show', compact('faqSection'));
    }

    public function edit(FaqSection $faqSection)
    {
        $faqSection->load('items');

        $pages = $this->pages();

        return view('faq_sections.edit', compact('faqSection', 'pages'));
    }

    public function update(Request $request, FaqSection $faqSection)
    {
        $request->merge([
            'page_slug' => $this->resolvePageSlug($request),
        ]);

        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $faqSection) {
            $faqSection->update([
                'page_slug' => $validated['page_slug'],
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->boolean('status'),
            ]);

            $faqSection->items()->delete();

            $this->saveItems($request, $faqSection);
        });

        return redirect()
            ->route('faq-sections.index')
            ->with('success', 'FAQ section updated successfully.');
    }

    public function destroy(FaqSection $faqSection)
    {
        $faqSection->delete();

        return redirect()
            ->route('faq-sections.index')
            ->with('success', 'FAQ section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'required|string|max:255',

            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable',

            'items' => 'nullable|array',
            'items.*.question' => 'nullable|string|max:255',
            'items.*.answer' => 'nullable|string',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.is_open' => 'nullable',
            'items.*.status' => 'nullable',
        ]);
    }

    private function saveItems(Request $request, FaqSection $faqSection): void
    {
        $items = $request->input('items', []);

        foreach ($items as $item) {
            if (empty($item['question'])) {
                continue;
            }

            $faqSection->items()->create([
                'question' => $item['question'],
                'answer' => $item['answer'] ?? null,
                'sort_order' => $item['sort_order'] ?? 0,
                'is_open' => ! empty($item['is_open']) ? 1 : 0,
                'status' => ! empty($item['status']) ? 1 : 0,
            ]);
        }
    }

    private function resolvePageSlug(Request $request): string
    {
        $pageSlug = trim((string) $request->input('page_slug'));

        if ($pageSlug === '__custom__') {
            $customPage = trim((string) $request->input('custom_page_slug'));

            return Str::slug($customPage);
        }

        return Str::slug($pageSlug);
    }

    private function pages(): array
    {
        $defaultPages = [
            'home' => 'Home',
            'about' => 'About',
            'brands' => 'Brands',
            'services' => 'Services',
            'company' => 'Company',
            'careers' => 'Careers',
            'contact' => 'Contact',
        ];

        $dbPages = FaqSection::query()
            ->select('page_slug')
            ->distinct()
            ->orderBy('page_slug')
            ->pluck('page_slug')
            ->filter()
            ->mapWithKeys(function ($slug) {
                return [$slug => Str::headline($slug)];
            })
            ->toArray();

        return array_merge($defaultPages, $dbPages);
    }
}