<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::with('category')
            ->when($request->input('search'), fn($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->when($request->input('category'), fn($q, $c) => $q->where('category_id', $c))
            ->when($request->input('status'), fn($q, $s) => $q->where('status', $s))
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $categories = Category::all();

        return view('admin.news.index', compact('news', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.news.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
            'author_role' => 'nullable|string|max:100',
        ]);

        $validated['author_id'] = auth()->id();
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['published_at'] = $validated['status'] === 'published' ? now() : null;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.news.form', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug,' . $news->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
            'author_role' => 'nullable|string|max:100',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        if ($validated['status'] === 'published') {
            $validated['published_at'] = $news->published_at ?? now();
        } else {
            $validated['published_at'] = null;
        }

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($news->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
