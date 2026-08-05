<?php

declare(strict_types=1);

namespace App\Providers;

use App\View\Composers\FooterComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.tailwind');
        View::composer([
            'partials.footer',
            'layouts.app',
            'admin.login',
            'components.admin-dashboard-layout',
        ], FooterComposer::class);
    }
}
