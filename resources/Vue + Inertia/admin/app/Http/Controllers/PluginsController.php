<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PluginsController extends Controller
{

    public function animation()
    {
        return Inertia::render('admin/plugins/animation/index');
    }

    public function clipboard()
    {
        return Inertia::render('admin/plugins/clipboard/index');
    }

    public function idleTimer()
    {
        return Inertia::render('admin/plugins/idle-timer/index');
    }

    public function loadingButtons()
    {
        return Inertia::render('admin/plugins/loading-buttons/index');
    }

    public function masonry()
    {
        return Inertia::render('admin/plugins/masonry/index');
    }

    public function passMeter()
    {
        return Inertia::render('admin/plugins/pass-meter/index');
    }

    public function pdfViewer()
    {
        return Inertia::render('admin/plugins/pdf-viewer/index');
    }

    public function sweetAlerts()
    {
        return Inertia::render('admin/plugins/sweet-alerts/index');
    }

    public function textDiff()
    {
        return Inertia::render('admin/plugins/text-diff/index');
    }

    public function tour()
    {
        return Inertia::render('admin/plugins/tour/index');
    }
}