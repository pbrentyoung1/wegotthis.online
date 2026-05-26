<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MetricsController extends Controller
{

    public function index()
    {
        return Inertia::render('admin/metrics/index');
    }
}