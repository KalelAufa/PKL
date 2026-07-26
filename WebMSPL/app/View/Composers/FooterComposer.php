<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\PageContent;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        // company page = single source for all identity data
        // contact page = hero, map_embed_url only (no identity data)
        $footerContent = PageContent::where('page', 'company')->get()->keyBy('key');

        $view->with('footerContent', $footerContent);
    }
}
