<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function projects()
    {
        return Inertia::render('admin/dashboard/projects/index');
    }
}
