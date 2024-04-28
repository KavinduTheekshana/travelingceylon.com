<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = DB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        $packages = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        $gallery = DB::table('galleries')->where('status', 1)->where('popular', 1)->whereNull('deleted_at')->get();
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $testimonials = DB::table('testimonials')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.home', ['destinations' => $destinations, 'packages' => $packages, 'gallery' => $gallery, 'testimonials' => $testimonials, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function about()
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        return view('frontend.about.about', ['gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function contact()
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        return view('frontend.contact.contact', ['gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function gallery()
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $gallery = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.gallery.gallery', ['gallery' => $gallery, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function plan()
    {
        $gallery = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(50)->get();
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        return view('frontend.plan.plan', ['gallery' => $gallery, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function single_destination($slug)
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $destinations = Destinations::where('slug', $slug)->first();
        return view('frontend.destinations.destination', ['destinations' => $destinations, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function single_package($slug)
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $package = Packages::where('slug', $slug)->first();
        $package_list = Packages::where('status', 1)->get();
        $package_id = $package->id;
        $package_details = DB::table('package_details')->where('package_id', $package_id)->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.packages.package_details', ['package' => $package, 'package_list' => $package_list, 'package_details' => $package_details, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function all_destinations()
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $destinations = DB::table('destinations')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.destinations.destinations', ['destinations' => $destinations, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }

    public function all_packages()
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $packages = DB::table('packages')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.packages.packages', ['packages' => $packages, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer]);
    }
}
