<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DestinationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $destinations = FacadesDB::table('destinations')->whereNull('deleted_at')->get();
        return view('backend.pages.destinations.destination_list', ['destinations' => $destinations]);
    }

    public function add()
    {
        return view('backend.pages.destinations.destination_add');
    }
    public function active($id)
    {
        $destinations = Destinations::find($id);
        $destinations->status = '1';
        $destinations->save();
        return redirect()->back()->with('status', 'Destinations Activated Sucessfully');
    }
    public function diactive($id)
    {
        $destinations = Destinations::find($id);
        $destinations->status = '0';
        $destinations->save();
        return redirect()->back()->with('status', 'Destinations Diactivated Sucessfully');
    }
    public function popular($id)
    {
        $destinations = Destinations::find($id);
        $destinations->popular_status = '1';
        $destinations->save();
        return redirect()->back()->with('status', 'Destinations Mark As Popular Sucessfully');
    }
    public function notpopular($id)
    {
        $destinations = Destinations::find($id);
        $destinations->popular_status = '0';
        $destinations->save();
        return redirect()->back()->with('status', 'Destinations Mark As Not Popular Sucessfully');
    }
    public function delete($id)
    {
        $destinations = Destinations::find($id);
        $destinations->delete();
        return redirect()->back()->with('status', 'Destinations Delete Sucessfully');
    }
    public function update_view($id)
    {
        $destinations = Destinations::find($id);
        return view('backend.pages.destinations.destination_update', ['destinations' => $destinations]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'], // Ensure it's an image
            'description' => ['required'],
            'meta_keywords' => ['required'],
            'meta_description' => ['required'],
        ]);

        $destinations = new Destinations();
        $destinations->title = $request->input('title');
        $destinations->slug = $this->generateUniqueSlug($request->input('title'));
        $destinations->location = $request->input('location');
        $destinations->category = $request->input('category');
        $destinations->description = $request->input('description');
        $destinations->meta_keywords = $request->input('meta_keywords');
        $destinations->meta_description = $request->input('meta_description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/destinations/'; // Upload path

            // Ensure the directory exists
            if (!file_exists(public_path($destinationPath))) {
                mkdir(public_path($destinationPath), 0777, true);
            }

            // Check if the uploaded image is JPEG or JPG
            if (in_array($image->getClientOriginalExtension(), ['jpeg', 'jpg'])) {
                $webpFileName = date('YmdHis') . '.webp';

                // Convert the image to WebP using Intervention Image
                $imageIntervention = Image::make($image->getRealPath());
                $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality
                $imageIntervention->save(public_path($destinationPath . $webpFileName));

                // Set WebP file path
                $destinations->image = $destinationPath . $webpFileName;
            } else {
                // Handle other formats
                $destination_image = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $destination_image);
                $destinations->image = $destination_image;
            }
        } else {
            $destinations->image = 'uploads/destinations/default.jpg';
        }

        $destinations->save();

        return redirect('add-destinations')->with('status', 'New Destination Added Successfully');
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'meta_keywords' => ['required'],
            'meta_description' => ['required'],
        ]);

        // Find the existing destination record
        $destinations_id = $request->input('id');
        $destinations = Destinations::findOrFail($destinations_id);

        $destinations->title = $request->input('title');
        $destinations->slug = $this->generateUniqueSlug($request->input('title'), $destinations_id);
        $destinations->location = $request->input('location');
        $destinations->category = $request->input('category');
        $destinations->description = $request->input('description');
        $destinations->meta_keywords = $request->input('meta_keywords');
        $destinations->meta_description = $request->input('meta_description');

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/destinations/'; // Upload path

            // Ensure the directory exists
            if (!file_exists(public_path($destinationPath))) {
                mkdir(public_path($destinationPath), 0777, true);
            }

            // Check if the uploaded image is JPEG or JPG
            if (in_array($image->getClientOriginalExtension(), ['jpeg', 'jpg'])) {
                $webpFileName = date('YmdHis') . '.webp';

                // Convert the image to WebP using Intervention Image
                $imageIntervention = Image::make($image->getRealPath());
                $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality
                $imageIntervention->save(public_path($destinationPath . $webpFileName));

                // Set WebP file path
                $destinations->image = $destinationPath . $webpFileName;
            } else {
                // Handle other formats
                $destination_image = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $destination_image);
                $destinations->image = $destination_image;
            }
        }

        // Save the updated data
        $destinations->save();

        return redirect('destinations-list')->with('status', 'Destination Updated Successfully');
    }

    private function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title, '-');
        $originalSlug = $slug;
        $counter = 1;

        while (
            Destinations::where('slug', $slug)
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
