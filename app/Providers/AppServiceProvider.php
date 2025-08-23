<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CommercialProject;
use App\Models\ResidentialProject;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            // Share latest commercial project with all views
        $commercialProject = CommercialProject::latest()->first();
        View::share('commercialProject', $commercialProject);

                // Latest residential project
        $residentialProject = ResidentialProject::latest()->first();
        View::share('residentialProject', $residentialProject);
    }
}
