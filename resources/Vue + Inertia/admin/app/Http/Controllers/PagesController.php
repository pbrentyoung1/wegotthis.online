<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{

    public function accountSettings()
    {
        return Inertia::render('admin/pages/account-settings/index');
    }

    public function empty()
    {
        return Inertia::render('admin/pages/empty/index');
    }

    public function faq()
    {
        return Inertia::render('admin/pages/faq/index');
    }

    public function gallery()
    {
        return Inertia::render('admin/pages/gallery/index');
    }

    public function pricing()
    {
        return Inertia::render('admin/pages/pricing/index');
    }

    public function privacyPolicy()
    {
        return Inertia::render('admin/pages/privacy-policy/index');
    }

    public function profile()
    {
        return Inertia::render('admin/pages/profile/index');
    }

    public function searchResults()
    {
        return Inertia::render('admin/pages/search-results/index');
    }

    public function sitemap()
    {
        return Inertia::render('admin/pages/sitemap/index');
    }

    public function termsConditions()
    {
        return Inertia::render('admin/pages/terms-conditions/index');
    }

    public function timeline()
    {
        return Inertia::render('admin/pages/timeline/index');
    }

    public function comingSoon()
    {
        return Inertia::render('others/pages/coming-soon/index');
    }
}