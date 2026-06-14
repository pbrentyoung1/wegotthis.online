<?php

namespace App\Providers;

use App\Http\ViewComposers\TopbarComposer;
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
        View::composer('shared.partials.topbar', TopbarComposer::class);
    }
}
