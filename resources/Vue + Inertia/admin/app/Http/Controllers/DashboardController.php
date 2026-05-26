<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function analytics()
    {
        return Inertia::render('admin/dashboard/analytics/index');
    }

    public function ecommerce()
    {
        return Inertia::render('admin/dashboard/ecommerce/index');
    }

    public function projects()
    {
        return Inertia::render('admin/dashboard/projects/index');
    }
}