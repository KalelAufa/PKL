<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsletterSubscriber;
use App\Models\PageContent;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function subscribe(Request $request, RateLimiter $limiter)
    {
        $key = 'newsletter:' . $request->ip();

        if ($limiter->tooManyAttempts($key, 5)) {
            return response()->json([
                'success' => false,
                'message' => 'Terlalu banyak permintaan. Silakan coba lagi nanti.',
            ], 429);
        }

        $limiter->hit($key, 3600);

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

        $news = $query->paginate(6)->withQueryString();
        $categories = Category::all();
        $featuredNews = News::where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first()
            ?? News::where('status', 'published')
            ->latest('published_at')
            ->first();

        $pageContents = PageContent::where('page', 'news')->get()->keyBy('key');

        return view('news', compact('news', 'categories', 'featuredNews', 'pageContents'));
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

        return view('news-detail', compact('news', 'relatedNews'));
    }
}
