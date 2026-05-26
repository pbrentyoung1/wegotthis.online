<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ChartsController extends Controller
{

    public function apexArea()
    {
        return Inertia::render('admin/charts/apex/area/index');
    }

    public function apexBar()
    {
        return Inertia::render('admin/charts/apex/bar/index');
    }

    public function apexBoxplot()
    {
        return Inertia::render('admin/charts/apex/boxplot/index');
    }

    public function apexBubble()
    {
        return Inertia::render('admin/charts/apex/bubble/index');
    }

    public function apexCandlestick()
    {
        return Inertia::render('admin/charts/apex/candlestick/index');
    }

    public function apexColumn()
    {
        return Inertia::render('admin/charts/apex/column/index');
    }

    public function apexFunnel()
    {
        return Inertia::render('admin/charts/apex/funnel/index');
    }

    public function apexHeatmap()
    {
        return Inertia::render('admin/charts/apex/heatmap/index');
    }

    public function apexLine()
    {
        return Inertia::render('admin/charts/apex/line/index');
    }

    public function apexMixed()
    {
        return Inertia::render('admin/charts/apex/mixed/index');
    }

    public function apexPie()
    {
        return Inertia::render('admin/charts/apex/pie/index');
    }

    public function apexPolarArea()
    {
        return Inertia::render('admin/charts/apex/polar-area/index');
    }

    public function apexRadar()
    {
        return Inertia::render('admin/charts/apex/radar/index');
    }

    public function apexRadialbar()
    {
        return Inertia::render('admin/charts/apex/radialbar/index');
    }

    public function apexRange()
    {
        return Inertia::render('admin/charts/apex/range/index');
    }

    public function apexScatter()
    {
        return Inertia::render('admin/charts/apex/scatter/index');
    }

    public function apexSlope()
    {
        return Inertia::render('admin/charts/apex/slope/index');
    }

    public function apexSparklines()
    {
        return Inertia::render('admin/charts/apex/sparklines/index');
    }

    public function apexTimeline()
    {
        return Inertia::render('admin/charts/apex/timeline/index');
    }

    public function apexTreemap()
    {
        return Inertia::render('admin/charts/apex/treemap/index');
    }

    public function echartArea()
    {
        return Inertia::render('admin/charts/echart/area/index');
    }

    public function echartBar()
    {
        return Inertia::render('admin/charts/echart/bar/index');
    }

    public function echartCandlestick()
    {
        return Inertia::render('admin/charts/echart/candlestick/index');
    }

    public function echartGauge()
    {
        return Inertia::render('admin/charts/echart/gauge/index');
    }

    public function echartGeoMap()
    {
        return Inertia::render('admin/charts/echart/geo-map/index');
    }

    public function echartHeatmap()
    {
        return Inertia::render('admin/charts/echart/heatmap/index');
    }

    public function echartLine()
    {
        return Inertia::render('admin/charts/echart/line/index');
    }

    public function echartOther()
    {
        return Inertia::render('admin/charts/echart/other/index');
    }

    public function echartPie()
    {
        return Inertia::render('admin/charts/echart/pie/index');
    }

    public function echartRadar()
    {
        return Inertia::render('admin/charts/echart/radar/index');
    }

    public function echartScatter()
    {
        return Inertia::render('admin/charts/echart/scatter/index');
    }
}