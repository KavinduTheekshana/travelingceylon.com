<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Destinations;
use Illuminate\Support\ServiceProvider;

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
        View::composer('frontend.components.footer', function ($view) {
            $destinations = Destinations::where('status', 1)
                ->select('title', 'slug')
                ->take(10)
                ->get();
            $view->with('destinations_list', $destinations);
        });
    }
}
