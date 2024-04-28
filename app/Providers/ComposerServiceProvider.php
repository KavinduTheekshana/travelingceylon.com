<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
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
    
        View::composer('*', function ($view) {
            $booking_count = DB::table('bookings')->where('read','1')->whereNull('deleted_at')->orderBy('id', 'desc')->count();
            $plan_count = DB::table('plans')->where('read','1')->whereNull('deleted_at')->orderBy('id', 'desc')->count();
            $recent_bookings = DB::table('bookings')->where('read','1')->whereNull('deleted_at')->orderBy('id', 'desc')->take(10)->get();
            $recent_plans = DB::table('plans')->where('read','1')->whereNull('deleted_at')->orderBy('id', 'desc')->take(10)->get();
            $view->with([
                'booking_count' => $booking_count,
                'recent_bookings' => $recent_bookings,
                'plan_count' => $plan_count,
                'recent_plans' => $recent_plans
            ]);
        });
    }
}
