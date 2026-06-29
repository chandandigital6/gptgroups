<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsCategory::withCount('posts');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $newsCategories = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('news_categories.index', compact('newsCategories'));
    }

    public function create()
    {
        return view('news_categories.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $slug = $data['slug'] ?: Str::slug($data['name']);

        NewsCategory::create([
            'name' => $data['name'],
            'slug' => $slug,
            'theme' => $data['theme'] ?? 'blue',
            'sort_order' => $data['sort_order'] ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('news-categories.index')
            ->with('success', 'News category created successfully.');
    }

    public function show(NewsCategory $newsCategory)
    {
        $newsCategory->load('posts');

        return view('news_categories.show', compact('newsCategory'));
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('news_categories.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $data = $this->validatedData($request, $newsCategory->id);

        $slug = $data['slug'] ?: Str::slug($data['name']);

        $newsCategory->update([
            'name' => $data['name'],
            'slug' => $slug,
            'theme' => $data['theme'] ?? 'blue',
            'sort_order' => $data['sort_order'] ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('news-categories.index')
            ->with('success', 'News category updated successfully.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect()
            ->route('news-categories.index')
            ->with('success', 'News category deleted successfully.');
    }

    private function validatedData(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('news_categories', 'slug')->ignore($ignoreId),
            ],
            'theme' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}