<?php

namespace App\Http\Controllers;

use App\Models\PackageDetails;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $packages = DB::table('packages')->whereNull('deleted_at')->get();
        return view('backend.pages.packages.package_list', ['packages' => $packages]);
    }

    public function package_view($id)
    {
        $package = DB::table('packages')->where('id', $id)->whereNull('deleted_at')->first();
        $package_details = DB::table('package_details')->where('package_id', $id)->whereNull('deleted_at')->orderBy('day', 'asc')->get();
        return view('backend.pages.packages.package_details', ['package' => $package, 'package_details' => $package_details]);
    }

    public function add()
    {
        return view('backend.pages.packages.package_add');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'days' => ['required', 'numeric', 'max:255'],
            'nights' => ['required', 'numeric', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'peoples' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'meta_keywords' => ['required'],
            'meta_description' => ['required'],
        ]);

        $package = new Packages();
        $package->title = $request->input('title');
        $package->slug = $this->generateUniqueSlug($request->input('title'));
        $package->location = $request->input('location');
        $package->days = $request->input('days');
        $package->nights = $request->input('nights');
        $package->peoples = $request->input('peoples');
        $package->price = $request->input('price');
        $package->description = $request->input('description');
        $package->meta_keywords = $request->input('meta_keywords');
        $package->meta_description = $request->input('meta_description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'uploads/packages/'; // Upload directory
            $webpFileName = time() . '.webp'; // WebP file name

            // Ensure the directory exists
            if (!file_exists(public_path($imagePath))) {
                mkdir(public_path($imagePath), 0777, true);
            }

            // Convert image to WebP and save
            $imageIntervention = Image::make($image->getRealPath());
            $imageIntervention->encode('webp', 80); // Encode as WebP with 80% quality
            $imageIntervention->save(public_path($imagePath . $webpFileName));

            $package->image = $imagePath . $webpFileName;
        } else {
            $package->image = 'uploads/destinations/default.jpg';
        }

        $package->save();
        return redirect('package-list')->with('status', 'New package added successfully');
    }

    public function popular($id)
    {
        $package = Packages::find($id);
        $package->popular_status = '1';
        $package->save();
        return redirect()->back()->with('status', 'Package Mark As Popular Sucessfully');
    }
    public function notpopular($id)
    {
        $package = Packages::find($id);
        $package->popular_status = '0';
        $package->save();
        return redirect()->back()->with('status', 'Package Mark As Not Popular Sucessfully');
    }
    public function active($id)
    {
        $package = Packages::find($id);
        $package->status = '1';
        $package->save();
        return redirect()->back()->with('status', 'Package Activated Sucessfully');
    }
    public function diactive($id)
    {
        $package = Packages::find($id);
        $package->status = '0';
        $package->save();
        return redirect()->back()->with('status', 'Package Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $package = Packages::find($id);
        $package->delete();
        return redirect()->back()->with('status', 'Package Delete Sucessfully');
    }
    public function update_view($id)
    {
        $package = Packages::find($id);
        return view('backend.pages.packages.package_update', ['package' => $package]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'days' => ['required', 'numeric', 'max:255'],
            'nights' => ['required', 'numeric', 'max:255'],
            'peoples' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'meta_keywords' => ['required'],
            'meta_description' => ['required'],
        ]);

        // Find the existing package record
        $package_id = $request->input('id');
        $package = Packages::findOrFail($package_id);

        // Update fields
        $package->title = $request->input('title');
        $package->slug = $this->generateUniqueSlug($request->input('title'), $package_id);
        $package->location = $request->input('location');
        $package->days = $request->input('days');
        $package->nights = $request->input('nights');
        $package->peoples = $request->input('peoples');
        $package->price = $request->input('price');
        $package->description = $request->input('description');
        $package->meta_keywords = $request->input('meta_keywords');
        $package->meta_description = $request->input('meta_description');

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Check if the uploaded image is JPEG
            if (in_array($image->getClientOriginalExtension(), ['jpeg', 'jpg'])) {
                $imagePath = 'uploads/packages/';
                $webpFileName = time() . '.webp';

                // Ensure the directory exists
                if (!file_exists(public_path($imagePath))) {
                    mkdir(public_path($imagePath), 0777, true);
                }

                // Convert the image to WebP
                $imageIntervention = Image::make($image->getRealPath());
                $imageIntervention->encode('webp', 80); // Encode as WebP with 80% quality
                $imageIntervention->save(public_path($imagePath . $webpFileName));

                // Set WebP path
                $package->image = $imagePath . $webpFileName;
            } else {
                // Handle other image formats (if needed, save directly without conversion)
                $packagePath = 'uploads/packages/';
                $package_image = $packagePath . time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path($packagePath), $package_image);
                $package->image = $package_image;
            }
        }

        // Save the updated data
        $package->save();

        return redirect('package-list')->with('status', 'Package Updated Successfully');
    }

    public function add_details($id)
    {
        $package = Packages::find($id);
        return view('backend.pages.packages.add_details', ['package' => $package]);
    }
    public function details_list($id)
    {
        $package = Packages::find($id);
        $package_details = DB::table('package_details')->where('package_id', $id)->whereNull('deleted_at')->orderBy('day', 'asc')->get();
        return view('backend.pages.packages.details_list', ['package' => $package, 'package_details' => $package_details]);
    }
    private function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title, '-');
        $originalSlug = $slug;
        $counter = 1;

        while (
            Packages::where('slug', $slug)
            ->when($id, function ($query) use ($id) {
                return $query->where('id', '!=', $id); // Exclude the current record
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
