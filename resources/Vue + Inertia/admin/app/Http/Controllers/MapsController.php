<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MapsController extends Controller
{

    public function google()
    {
        return Inertia::render('admin/maps/google/index');
    }

    public function leaflet()
    {
        return Inertia::render('admin/maps/leaflet/index');
    }

    public function vector()
    {
        return Inertia::render('admin/maps/vector/index');
    }
}