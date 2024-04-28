<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $destinations_count = DB::table('destinations')->whereNull('deleted_at')->count();
        $package_count = DB::table('packages')->whereNull('deleted_at')->count();
        $gallery_count = DB::table('galleries')->whereNull('deleted_at')->count();
        $testimonial_count = DB::table('testimonials')->whereNull('deleted_at')->count();
        $bookings_count = DB::table('bookings')->whereNull('deleted_at')->count();
        $contacts_count = DB::table('contacts')->whereNull('deleted_at')->count();
        $plan_count = DB::table('plans')->whereNull('deleted_at')->count();
        $users_count = DB::table('users')->count();
        return view('backend.dashboard',['destinations_count' => $destinations_count,'bookings_count' => $bookings_count,
        'package_count'=>$package_count,'gallery_count'=>$gallery_count,'testimonial_count'=>$testimonial_count,
        'contacts_count'=>$contacts_count,'plan_count'=>$plan_count,'users_count'=>$users_count]);
        // return view('backend.dashboard');
    }
}
