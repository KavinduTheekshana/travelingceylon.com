<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destinations;
use App\Models\Gallery;
use App\Models\Packages;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = DB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();

        // Get packages with featured/popular priority, limited to 9
        $featured_packages = DB::table('packages')
            ->where('status', 1)
            ->where('popular_status', 1)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();

        // If we have fewer than 9 featured packages, fill with regular packages
        $packages = $featured_packages;
        if ($featured_packages->count() < 9) {
            $remaining_count = 9 - $featured_packages->count();
            $featured_ids = $featured_packages->pluck('id');

            $regular_packages = DB::table('packages')
                ->where('status', 1)
                ->whereNull('deleted_at')
                ->whereNotIn('id', $featured_ids)
                ->orderBy('created_at', 'desc')
                ->take($remaining_count)
                ->get();

            $packages = $featured_packages->merge($regular_packages);
        }

        $gallery = DB::table('galleries')->where('status', 1)->where('popular', 1)->whereNull('deleted_at')->get();
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        $testimonials = DB::table('testimonials')->where('status', 1)->whereNull('deleted_at')->get();
        $blogs = Post::with('category')
            ->where('status', 1)
            ->take(2)
            ->orderBy('created_at', 'desc') // Corrected syntax
            ->get();
        return view('frontend.home', ['destinations' => $destinations, 'packages' => $packages, 'gallery' => $gallery, 'testimonials' => $testimonials, 'gallery_footer' => $gallery_footer, 'packages_footer' => $packages_footer, 'blogs' => $blogs]);
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
        $gallery = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->orderBy('id', 'desc')->get();
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

    public function all_destinations(Request $request)
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();

        // Get unique locations and categories for filters
        $locations = DB::table('destinations')
            ->select('location')
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->distinct()
            ->orderBy('location')
            ->get();

        $categories = DB::table('destinations')
            ->select('category')
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->distinct()
            ->orderBy('category')
            ->get();

        // Build query with search and filters
        $query = DB::table('destinations')
            ->where('status', 1)
            ->whereNull('deleted_at');

        // Search by title or description
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Order by title and paginate
        $destinations = $query->orderBy('title', 'asc')->paginate(9);

        // Append query parameters to pagination links
        $destinations->appends($request->query());

        return view('frontend.destinations.destinations', [
            'destinations' => $destinations,
            'locations' => $locations,
            'categories' => $categories,
            'gallery_footer' => $gallery_footer,
            'packages_footer' => $packages_footer
        ]);
    }

    public function search_destinations(Request $request)
    {
        try {
            \Log::info('Search destinations called', $request->all());

            // Build query with search and filters
            $query = DB::table('destinations')
                ->where('status', 1)
                ->whereNull('deleted_at');

        // Search by title or description
        if ($request->filled('search') && trim($request->search) !== '') {
            $searchTerm = trim($request->search);
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by location
        if ($request->filled('location') && trim($request->location) !== '') {
            $query->where('location', trim($request->location));
        }

        // Filter by category
        if ($request->filled('category') && trim($request->category) !== '') {
            $query->where('category', trim($request->category));
        }

        // Get current page from request, default to 1
        $page = $request->get('page', 1);

        // Order by title and paginate
        $destinations = $query->orderBy('title', 'asc')->paginate(9, ['*'], 'page', $page);

            // Return JSON response with HTML content
            return response()->json([
                'success' => true,
                'html' => view('frontend.destinations.destination_results', compact('destinations'))->render(),
                'pagination' => $destinations->links('frontend.components.pagination', ['itemType' => 'destinations'])->render(),
                'total' => $destinations->total(),
                'current_page' => $destinations->currentPage(),
                'last_page' => $destinations->lastPage(),
                'per_page' => $destinations->perPage(),
                'from' => $destinations->firstItem(),
                'to' => $destinations->lastItem()
            ]);
        } catch (\Exception $e) {
            \Log::error('Search destinations error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while searching destinations.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function all_packages(Request $request)
    {
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();

        // Get unique locations for filters
        $locations = DB::table('packages')
            ->select('location')
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->distinct()
            ->orderBy('location')
            ->get();

        // Build query with search and filters
        $query = DB::table('packages')
            ->where('status', 1)
            ->whereNull('deleted_at');

        // Search by title or description
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Order by title and paginate
        $packages = $query->orderBy('title', 'asc')->paginate(9);

        // Append query parameters to pagination links
        $packages->appends($request->query());

        return view('frontend.packages.packages', [
            'packages' => $packages,
            'locations' => $locations,
            'gallery_footer' => $gallery_footer,
            'packages_footer' => $packages_footer
        ]);
    }

    public function search_packages(Request $request)
    {
        try {
            \Log::info('Search packages called', $request->all());

            // Validate the request
            $request->validate([
                'search' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'page' => 'nullable|integer|min:1'
            ]);

            // Build query with search and filters
            $query = DB::table('packages')
                ->where('status', 1)
                ->whereNull('deleted_at');

            // Search by title or description
            if ($request->filled('search') && trim($request->search) !== '') {
                $searchTerm = trim($request->search);
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                });
            }

            // Filter by location
            if ($request->filled('location') && trim($request->location) !== '') {
                $query->where('location', trim($request->location));
            }

            // Get current page from request, default to 1
            $page = max(1, (int)$request->get('page', 1));

            // Order by title and paginate
            $packages = $query->orderBy('title', 'asc')->paginate(9, ['*'], 'page', $page);

            // Check if we have results
            if ($packages->isEmpty() && $page > 1) {
                // If no results on this page, redirect to page 1
                $packages = $query->orderBy('title', 'asc')->paginate(9, ['*'], 'page', 1);
            }

            // Return JSON response with HTML content
            return response()->json([
                'success' => true,
                'html' => view('frontend.packages.package_results', compact('packages'))->render(),
                'pagination' => $packages->links('frontend.components.pagination', ['itemType' => 'packages'])->render(),
                'count' => $packages->total(),
                'current_page' => $packages->currentPage(),
                'last_page' => $packages->lastPage()
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Package search validation error: ' . json_encode($e->errors()));

            return response()->json([
                'success' => false,
                'message' => 'Invalid search parameters.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Package search error: ' . $e->getMessage());
            \Log::error('Package search stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while searching packages.',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function blog($slug)
    {
        $distination = Destinations::where('status', 1)
            ->inRandomOrder()
            ->select('image', 'title', 'slug') // Fetch both image and title
            ->first();
        // Retrieve the blog by slug
        $blog = Post::with('category', 'user')->where('slug', $slug)->firstOrFail();

        $recents = Post::with('category')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::withCount('blogs')->get();
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        // Pass the blog data to the view
        return view('frontend.blog.article', compact('blog', 'distination', 'recents', 'categories', 'gallery_footer', 'packages_footer'));
    }

    public function all()
    {
        $distination = Destinations::where('status', 1)
            ->inRandomOrder()
            ->select('image', 'title', 'slug') // Fetch both image and title
            ->first();

        $blogs = Post::with('category')->where('status', 1)->orderby('created_at', 'desc')->paginate(8);
        $recents = Post::with('category')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::withCount('blogs')->get();
        $gallery_footer = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->take(6)->get();
        $packages_footer = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->take(2)->get();
        // Pass the blog data to the view
        return view('frontend.blog.list', compact('blogs', 'distination', 'recents', 'categories', 'gallery_footer', 'packages_footer'));
    }
}
