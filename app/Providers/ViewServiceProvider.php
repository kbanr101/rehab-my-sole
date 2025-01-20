<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share global data
        View::share('siteTitle', 'My Laravel Application');
        View::share('siteDescription', 'A Laravel application example');

        // Share authenticated user with all views
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }

    public function register()
    {
        //
    }
}
