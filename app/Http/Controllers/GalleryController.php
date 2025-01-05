<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $galleries = DB::table('galleries')->whereNull('deleted_at')->get();
        return view('backend.pages.gallery.image_list', ['galleries' => $galleries]);
    }

    public function add()
    {
        return view('backend.pages.gallery.add_image');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'], // Validate WebP and other image formats
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->input('title');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'uploads/gallery/'; // Upload path
            $fileName = time() . '.' . $image->getClientOriginalExtension(); // Retain original extension

            // Create directory if not exists
            if (!file_exists(public_path($imagePath))) {
                mkdir(public_path($imagePath), 0777, true);
            }

            // If the uploaded file is already WebP, save it directly
            if ($image->getClientOriginalExtension() === 'webp') {
                $image->move(public_path($imagePath), $fileName);
            } else {
                // Process non-WebP image with Intervention
                $imageIntervention = Image::make($image->getRealPath());

                // Check width and resize if necessary
                if ($imageIntervention->width() > 1920) {
                    $imageIntervention->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio(); // Maintain aspect ratio
                        $constraint->upsize(); // Prevent upsizing
                    });
                }

                // Encode to WebP
                $imageIntervention->encode('webp', 80); // Convert to WebP with 90% quality

                // Save optimized image
                $fileName = time() . '.webp'; // Change extension to WebP
                $imageIntervention->save(public_path($imagePath . $fileName));
            }

            $gallery->image = $imagePath . $fileName;
        } else {
            $gallery->image = 'uploads/gallery/default.jpg';
        }

        $gallery->save();

        return redirect('image-list')->with('status', 'New Image Added Successfully');
    }
    public function popular($id)
    {
        $gallery = Gallery::find($id);
        $gallery->popular = '1';
        $gallery->save();
        return redirect()->back()->with('status', 'Image Mark As Popular Sucessfully');
    }
    public function notpopular($id)
    {
        $gallery = Gallery::find($id);
        $gallery->popular = '0';
        $gallery->save();
        return redirect()->back()->with('status', 'Image Mark As Not Popular Sucessfully');
    }
    public function active($id)
    {
        $gallery = Gallery::find($id);
        $gallery->status = '1';
        $gallery->save();
        return redirect()->back()->with('status', 'Image Activated Sucessfully');
    }
    public function diactive($id)
    {
        $gallery = Gallery::find($id);
        $gallery->status = '0';
        $gallery->save();
        return redirect()->back()->with('status', 'Image Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back()->with('status', 'Image Delete Sucessfully');
    }
}
