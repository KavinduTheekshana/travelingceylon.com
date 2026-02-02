<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Destinations;
use App\Models\Contact;
use App\Models\Booking;
use App\Models\Plan;
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

        View::composer('backend.components.sidemenu', function ($view) {
            $unreadContactCount = Contact::where('read', 1)->count();
            $unreadBookingCount = Booking::where('read', 1)->count();
            $unreadPlanCount = Plan::where('read', 1)->count();
            $view->with('unreadContactCount', $unreadContactCount);
            $view->with('unreadBookingCount', $unreadBookingCount);
            $view->with('unreadPlanCount', $unreadPlanCount);
        });
    }
}
