<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function save(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/posts', 'public');
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
            'image' => $imagePath,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->back()->with('status', 'Post added successfully!');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/' . $blog->image); // Delete old image
            }
            $blog->image = $request->file('image')->store('images/posts', 'public');
        }

        // Update blog post
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $blog->image,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('status', 'Blog updated successfully!');
    }

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
