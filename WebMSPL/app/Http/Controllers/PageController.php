<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CompanyMilestone;
use App\Models\News;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\TeamMember;
class PageController extends Controller
{
    private function getPageContents(string $page)
    {
        return PageContent::where('page', $page)->get()->keyBy('key');
    }

    public function home()
    {
        $services = Service::whereNull('category')->orderBy('order')->get();
        $outsourcingSubServices = Service::where('category', 'outsourcing')->orderBy('order')->get();
        $news = News::where('status', 'published')
            ->with('category')
            ->latest('published_at')
            ->take(7)
            ->get();
        $pageContents = $this->getPageContents('home');

        return view('home', compact('services', 'outsourcingSubServices', 'news', 'pageContents'));
    }

    public function about()
    {
        $milestones = CompanyMilestone::orderBy('order')->get();
        $teamMembers = TeamMember::orderBy('order')->get();
        $pageContents = $this->getPageContents('about');

        return view('about', compact('milestones', 'teamMembers', 'pageContents'));
    }

    public function services()
    {
        $services = Service::whereNull('category')->orderBy('order')->get();
        $pageContents = $this->getPageContents('services');
        $outsourcingService = $services->firstWhere('slug', 'outsourcing');

        return view('services', compact('services', 'pageContents', 'outsourcingService'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::with(['features', 'processSteps'])->where('slug', $slug)->firstOrFail();
        $features = $service->features;
        $processSteps = $service->processSteps;
        $allServices = Service::orderBy('order')->get();

        return view('service-detail', compact('service', 'features', 'processSteps', 'allServices', 'slug'));
    }

    public function contact()
    {
        $pageContents    = $this->getPageContents('contact');
        $companySettings = PageContent::where('page', 'company')->get()->keyBy('key');

        return view('contact', compact('pageContents', 'companySettings'));
    }
}
