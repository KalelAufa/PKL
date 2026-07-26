<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $exists = NewsletterSubscriber::where('email', $validated['email'])->first();

        if ($exists) {
            if (!$exists->is_active) {
                $exists->update(['is_active' => true, 'subscribed_at' => now()]);
            }
            return response()->json(['success' => true, 'message' => 'Email sudah terdaftar.']);
        }

        NewsletterSubscriber::create([
            'email' => $validated['email'],
            'subscribed_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Terima kasih! Anda telah berlangganan.']);
    }
    public function index(Request $request)
    {
        $query = News::where('status', 'published')->with('category')->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->input('category')));
        }

        $news = $query->paginate(9)->withQueryString();
        $categories = Category::all();
        $featuredNews = News::where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        return view('berita', compact('news', 'categories', 'featuredNews'));
    }

    public function show($slug)
    {
        $news = News::where('status', 'published')
            ->where('slug', $slug)
            ->with(['category', 'author'])
            ->firstOrFail();

        $relatedNews = News::where('status', 'published')
            ->where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('berita-detail', compact('news', 'relatedNews'));
    }
}
