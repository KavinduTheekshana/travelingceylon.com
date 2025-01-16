<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $blogs = Post::whereNull('deleted_at')->get();
        return view('backend.pages.blog.list', ['blogs' => $blogs]);
    }

    public function add()
    {
        $categories = Category::get();
        return view('backend.pages.blog.add', ['categories' => $categories]);
    }

    // public function save(Request $request)
    // {
    //     // Validate input
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required',
    //         'category_id' => 'nullable|exists:categories,id',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'meta_keywords' => 'nullable|string|max:255',
    //         'meta_description' => 'nullable|string|max:255',
    //         'status' => 'required|boolean',
    //     ]);

    //     // Handle image upload if provided
    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images/posts', 'public');
    //     }

    //     // Create a unique slug for the post
    //     $slug = Str::slug($request->title);
    //     if (Post::where('slug', $slug)->exists()) {
    //         return back()->withErrors(['errors' => 'A post with a similar title already exists.']);
    //     }

    //     // Save the post
    //     Post::create([
    //         'title' => $request->title,
    //         'slug' => $slug,
    //         'content' => $request->content,
    //         'user_id' => auth()->id(), // Assuming the logged-in user is the author
    //         'category_id' => $request->category_id,
    //         'image' => $imagePath,
    //         'meta_keywords' => $request->meta_keywords,
    //         'meta_description' => $request->meta_description,
    //         'status' => $request->status,
    //     ]);

    //     // Redirect with success message
    //     return redirect()->back()->with('status', 'Post added successfully!');
    // }

    public function save(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // Allow WebP and other formats
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Handle image upload if provided
        $imagePath = null;
        $thumbnailPath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFolder = 'images/posts/'; // Main image folder
            $thumbnailFolder = 'images/posts/thumbnails/'; // Thumbnail folder

            // Generate a unique file name
            $fileName = time() . '.webp'; // Save all images as WebP

            // Process the image with Intervention Image
            $imageIntervention = Image::make($image->getRealPath());

            // Resize the image if necessary (e.g., width > 1920px)
            if ($imageIntervention->width() > 1920) {
                $imageIntervention->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                    $constraint->upsize(); // Prevent upsizing
                });
            }

            // Save the main image as WebP in the storage directory
            $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality
            $imagePath = $imageFolder . $fileName;
            Storage::disk('public')->put($imagePath, $imageIntervention->stream());

            // Generate thumbnail
            $thumbnailFileName = 'thumb_' . $fileName; // Thumbnail file name
            $thumbnail = Image::make($imageIntervention->stream());
            $thumbnail->resize(600, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });
            $thumbnailPath = $thumbnailFolder . $thumbnailFileName;
            Storage::disk('public')->put($thumbnailPath, $thumbnail->stream());
        }

        // Create a unique slug for the post
        $slug = Str::slug($request->title);
        if (Post::where('slug', $slug)->exists()) {
            return back()->withErrors(['errors' => 'A post with a similar title already exists.']);
        }

        // Save the post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'user_id' => auth()->id(), // Assuming the logged-in user is the author
            'category_id' => $request->category_id,
            'image' => $imagePath, // Main image path
            'thumbnail' => $thumbnailPath, // Thumbnail path
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->back()->with('status', 'Post added successfully!');
    }

    // Helper function to format file size
    private function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;
        while ($bytes >= 1024 && $index < count($units) - 1) {
            $bytes /= 1024;
            $index++;
        }
        return round($bytes, 2) . ' ' . $units[$index];
    }

    public function edit($id)
    {
        $blog = Post::findOrFail($id); // Retrieve the blog post by ID or fail
        $categories = Category::all(); // Retrieve all categories for the dropdown
        return view('backend.pages.blog.add', compact('blog', 'categories')); // Pass blog and categories to the form
    }


    public function update(Request $request, $id)
    {
        $blog = Post::findOrFail($id);

        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // Allow WebP and other formats
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFolder = 'images/posts/'; // Main image folder
            $thumbnailFolder = 'images/posts/thumbnails/'; // Thumbnail folder

            // Delete old image and thumbnail if they exist
            if ($blog->image) {
                Storage::disk('local')->delete($blog->image);
            }
            if ($blog->thumbnail) {
                Storage::disk('local')->delete($blog->thumbnail);
            }

            // Generate a unique file name
            $fileName = time() . '.webp'; // Save all images as WebP

            // Process the image with Intervention Image
            $imageIntervention = Image::make($image->getRealPath());

            // Resize the image if necessary (e.g., width > 1920px)
            if ($imageIntervention->width() > 1920) {
                $imageIntervention->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                    $constraint->upsize(); // Prevent upsizing
                });
            }

            // Save the main image as WebP in the storage directory
            $imageIntervention->encode('webp', 80); // Convert to WebP with 80% quality
            $imagePath = $imageFolder . $fileName;
            Storage::disk('public')->put($imagePath, $imageIntervention->stream());

            // Generate thumbnail
            $thumbnailFileName = 'thumb_' . $fileName; // Thumbnail file name
            $thumbnail = Image::make($imageIntervention->stream());
            $thumbnail->resize(600, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });
            $thumbnailPath = $thumbnailFolder . $thumbnailFileName;
            Storage::disk('public')->put($thumbnailPath, $thumbnail->stream());

            // Update image and thumbnail paths in the database
            $blog->image = $imagePath;
            $blog->thumbnail = $thumbnailPath;
        }

        // Update blog post
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->back()->with('status', 'Blog updated successfully!');
    }


    // public function update(Request $request, $id)
    // {
    //     $blog = Post::findOrFail($id);

    //     // Validate input
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'category_id' => 'nullable|exists:categories,id',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'meta_keywords' => 'nullable|string|max:255',
    //         'meta_description' => 'nullable|string|max:255',
    //         'status' => 'required|boolean',
    //     ]);

    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         if ($blog->image) {
    //             Storage::delete('public/' . $blog->image); // Delete old image
    //         }
    //         $blog->image = $request->file('image')->store('images/posts', 'public');
    //     }

    //     // Update blog post
    //     $blog->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'category_id' => $request->category_id,
    //         'image' => $blog->image,
    //         'meta_keywords' => $request->meta_keywords,
    //         'meta_description' => $request->meta_description,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->back()->with('status', 'Blog updated successfully!');
    // }

    public function active($id)
    {
        $post = Post::find($id);
        $post->status = '1';
        $post->save();
        return redirect()->back()->with('status', 'Testamonial Activated Sucessfully');
    }
    public function diactive($id)
    {
        $post = Post::find($id);
        $post->status = '0';
        $post->save();
        return redirect()->back()->with('status', 'Testamonial Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('status', 'Testamonial Delete Sucessfully');
    }
}
