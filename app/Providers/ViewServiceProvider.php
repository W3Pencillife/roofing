<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Get the first logo from the settings table
        $setting = DB::table('settings')->first();

        // Share logo variable with all views
        View::share('siteLogo', $setting ? $setting->logo : 'images/default-logo.png');
    }
}
