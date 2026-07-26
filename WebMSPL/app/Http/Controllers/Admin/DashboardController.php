<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\News;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = News::count();
        $totalLayanan = Service::count();
        $pesanBaru = ContactMessage::where('is_read', false)->count();
        $totalTim = TeamMember::count();

        $recentNews = News::latest()->take(3)->get();
        $recentMessages = ContactMessage::latest()->take(3)->get();

        return view('dashboard', compact(
            'totalBerita', 'totalLayanan', 'pesanBaru', 'totalTim',
            'recentNews', 'recentMessages'
        ));
    }
}
