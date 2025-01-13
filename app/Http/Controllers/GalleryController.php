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
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
        ]);

        $gallery = Gallery::findOrFail($request->id);
        $gallery->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'uploads/gallery/';
            $thumbnailPath = 'uploads/gallery/thumbnails/';
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            // Ensure directories exist
            if (!file_exists(public_path($imagePath))) {
                mkdir(public_path($imagePath), 0777, true);
            }
            if (!file_exists(public_path($thumbnailPath))) {
                mkdir(public_path($thumbnailPath), 0777, true);
            }

            // Resize and save image
            if ($image->getClientOriginalExtension() === 'webp') {
                $image->move(public_path($imagePath), $fileName);
            } else {
                $imageIntervention = Image::make($image->getRealPath());

                if ($imageIntervention->width() > 1920) {
                    $imageIntervention->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality
                $fileName = time() . '.webp';
                $imageIntervention->save(public_path($imagePath . $fileName));
            }

            // Generate thumbnail
            $thumbnailFileName = 'thumb_' . $fileName;
            $thumbnail = Image::make(public_path($imagePath . $fileName));
            $thumbnail->resize(600, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });
            $thumbnail->save(public_path($thumbnailPath . $thumbnailFileName));

            // Delete old image and thumbnail if they exist
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
            if ($gallery->thumbnail && file_exists(public_path($gallery->thumbnail))) {
                unlink(public_path($gallery->thumbnail));
            }

            // Update gallery data
            $gallery->image = $imagePath . $fileName;
            $gallery->thumbnail = $thumbnailPath . $thumbnailFileName;

            // Calculate and save file size using your existing function
            $fileSize = filesize(public_path($gallery->image));
            $gallery->size = $this->formatFileSize($fileSize);
        }

        $gallery->save();

        return redirect()->back()->with('status', 'Gallery updated successfully');
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
            $originalExtension = $image->getClientOriginalExtension(); // Get original extension
            $originalSize = $image->getSize(); // Get original size in bytes
            $humanReadableSize = $this->formatFileSize($originalSize); // Convert size to human-readable format
            $fileName = time() . '.' . $originalExtension; // Retain original extension

            // Create directory if not exists
            if (!file_exists(public_path($imagePath))) {
                mkdir(public_path($imagePath), 0777, true);
            }

            // If the uploaded file is already WebP, save it directly
            if ($originalExtension === 'webp') {
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
                $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality

                // Save optimized image
                $fileName = time() . '.webp'; // Change extension to WebP
                $imageIntervention->save(public_path($imagePath . $fileName));
            }

            // Generate thumbnail
            $thumbnailPath = 'uploads/gallery/thumbnails/'; // Thumbnail upload path
            $thumbnailFileName = 'thumb_' . $fileName; // Thumbnail file name

            // Create thumbnail directory if not exists
            if (!file_exists(public_path($thumbnailPath))) {
                mkdir(public_path($thumbnailPath), 0777, true);
            }

            // Create thumbnail using Intervention Image
            $thumbnail = Image::make(public_path($imagePath . $fileName));
            $thumbnail->resize(600, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });
            $thumbnail->save(public_path($thumbnailPath . $thumbnailFileName));

            // Save data to the database
            $gallery->image = $imagePath . $fileName;
            $gallery->thumbnail = $thumbnailPath . $thumbnailFileName;
            $gallery->extension = $originalExtension; // Save original extension
            $gallery->size = $humanReadableSize; // Save human-readable size
        } else {
            $gallery->image = 'uploads/gallery/default.jpg';
            $gallery->thumbnail = 'uploads/gallery/thumbnails/default.jpg';
            $gallery->extension = 'jpg'; // Default extension
            $gallery->size = '0KB'; // Default size
        }

        $gallery->save();

        return redirect('image-list')->with('status', 'New Image Added Successfully');
    }
    // private function formatFileSize($bytes)
    // {
    //     $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    //     $power = $bytes > 0 ? floor(log($bytes, 1024)) : 0;
    //     return number_format($bytes / pow(1024, $power), 2) . ' ' . $units[$power];
    // }
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
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
