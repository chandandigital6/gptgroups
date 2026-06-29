<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsPostController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsPost::with('category');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('small_title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($request->filled('news_category_id')) {
            $query->where('news_category_id', $request->news_category_id);
        }

        $newsPosts = $query
            ->orderBy('sort_order')
            ->orderByDesc('published_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $categories = NewsCategory::orderBy('name')->get();

        return view('news_posts.index', compact('newsPosts', 'categories'));
    }

    public function create()
    {
        $categories = NewsCategory::active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('news_posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $slug = $data['slug'] ?: Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news-posts', 'public');
        }

        $data['slug'] = $slug;
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        NewsPost::create($data);

        return redirect()
            ->route('news-posts.index')
            ->with('success', 'News post created successfully.');
    }

    public function show(NewsPost $newsPost)
    {
        $newsPost->load('category');

        return view('news_posts.show', compact('newsPost'));
    }

    public function edit(NewsPost $newsPost)
    {
        $categories = NewsCategory::active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('news_posts.edit', compact('newsPost', 'categories'));
    }

    public function update(Request $request, NewsPost $newsPost)
    {
        $data = $this->validatedData($request, $newsPost->id);

        $slug = $data['slug'] ?: Str::slug($data['title']);

        if ($request->hasFile('image')) {
            if ($newsPost->image) {
                Storage::disk('public')->delete($newsPost->image);
            }

            $data['image'] = $request->file('image')->store('news-posts', 'public');
        }

        $data['slug'] = $slug;
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $newsPost->update($data);

        return redirect()
            ->route('news-posts.index')
            ->with('success', 'News post updated successfully.');
    }

    public function destroy(NewsPost $newsPost)
    {
        if ($newsPost->image) {
            Storage::disk('public')->delete($newsPost->image);
        }

        $newsPost->delete();

        return redirect()
            ->route('news-posts.index')
            ->with('success', 'News post deleted successfully.');
    }

    private function validatedData(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'news_category_id' => 'nullable|exists:news_categories,id',

            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('news_posts', 'slug')->ignore($ignoreId),
            ],

            'small_title' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'published_date' => 'nullable|date',

            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}