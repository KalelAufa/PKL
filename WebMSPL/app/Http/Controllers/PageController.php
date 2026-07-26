<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CompanyMilestone;
use App\Models\News;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    private function getPageContents(string $page)
    {
        $contents = PageContent::where('page', $page)->get()->keyBy('key');
        $preview = Session::get('preview_contents');

        if ($preview) {
            foreach ($contents as $key => $item) {
                if (isset($preview[$item->id])) {
                    $item->value = $preview[$item->id];
                }
            }
        }

        return $contents;
    }

    public function home()
    {
        $services = Service::orderBy('order')->get();
        $news = News::where('status', 'published')
            ->with('category')
            ->latest('published_at')
            ->take(7)
            ->get();
        $pageContents = $this->getPageContents('home');

        return view('landing', compact('services', 'news', 'pageContents'));
    }

    public function about()
    {
        $milestones = CompanyMilestone::orderBy('order')->get();
        $teamMembers = TeamMember::orderBy('order')->get();
        $pageContents = $this->getPageContents('about');

        return view('tentang-kami', compact('milestones', 'teamMembers', 'pageContents'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->get();
        $pageContents = $this->getPageContents('services');

        return view('layanan', compact('services', 'pageContents'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $features = $service->features;
        $processSteps = $service->processSteps;
        $allServices = Service::orderBy('order')->get();

        return view('layanan-detail', compact('service', 'features', 'processSteps', 'allServices', 'slug'));
    }

    public function contact()
    {
        $pageContents    = $this->getPageContents('contact');
        $companySettings = PageContent::where('page', 'company')->get()->keyBy('key');

        return view('hubungi-kami', compact('pageContents', 'companySettings'));
    }
}
