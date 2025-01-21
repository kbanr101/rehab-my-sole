<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share data with all views
        View::share([
            'siteTitle' => 'My Laravel Application',
            'siteDescription' => 'A Laravel application example',
        ]);

        // Share authenticated user with all views
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });

        Paginator::useBootstrap();
    }

    public function register()
    {
        //
    }
}
