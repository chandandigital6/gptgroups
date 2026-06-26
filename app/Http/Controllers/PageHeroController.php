<?php

namespace App\Http\Controllers;

use App\Models\PageHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PageHeroController extends Controller
{
public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = PageHero::query();

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('badge_text', 'like', "%{$search}%")
                ->orWhere('title_line_1', 'like', "%{$search}%")
                ->orWhere('title_line_2', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    $pageHeroes = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => PageHero::count(),
        'active' => PageHero::where('status', 1)->count(),
        'inactive' => PageHero::where('status', 0)->count(),
        'latest' => PageHero::latest('id')->value('id') ?? 0,
    ];

    return view('page_heroes.index', compact('pageHeroes', 'stats'));
}

    public function create()
    {
        return view('page_heroes.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('page-heroes', 'public');
        }

        PageHero::create($data);

        return redirect()
            ->route('page-heroes.index')
            ->with('success', 'Page hero created successfully.');
    }

    public function show(PageHero $pageHero)
    {
        return view('page_heroes.show', compact('pageHero'));
    }

    public function edit(PageHero $pageHero)
    {
        return view('page_heroes.edit', compact('pageHero'));
    }

    public function update(Request $request, PageHero $pageHero)
    {
        $data = $this->validatedData($request, $pageHero->id);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($pageHero->image) {
                Storage::disk('public')->delete($pageHero->image);
            }

            $data['image'] = $request->file('image')->store('page-heroes', 'public');
        }

        $pageHero->update($data);

        return redirect()
            ->route('page-heroes.index')
            ->with('success', 'Page hero updated successfully.');
    }

    public function destroy(PageHero $pageHero)
    {
        if ($pageHero->image) {
            Storage::disk('public')->delete($pageHero->image);
        }

        $pageHero->delete();

        return redirect()
            ->route('page-heroes.index')
            ->with('success', 'Page hero deleted successfully.');
    }

    private function validatedData(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'page_slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('page_heroes', 'page_slug')->ignore($ignoreId),
            ],

            'badge_text' => 'nullable|string|max:255',

            'title_line_1' => 'required|string|max:255',
            'title_line_2' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_link' => 'nullable|string|max:255',

            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',

            'stat_1_value' => 'nullable|string|max:255',
            'stat_1_label' => 'nullable|string|max:255',

            'stat_2_value' => 'nullable|string|max:255',
            'stat_2_label' => 'nullable|string|max:255',

            'stat_3_value' => 'nullable|string|max:255',
            'stat_3_label' => 'nullable|string|max:255',

            'stat_4_value' => 'nullable|string|max:255',
            'stat_4_label' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'card_title' => 'nullable|string|max:255',
            'card_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}