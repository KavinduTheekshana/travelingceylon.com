<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $categories = Category::get();
        return view('backend.pages.category.list', ['categories' => $categories]);
    }

    public function add()
    {
        return view('backend.pages.category.add');
    }

    public function save(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255', // Ensure the name is provided and valid
        ]);

        // Generate a unique slug from the name
        $slug = Str::slug($request->name);

        // Check if the slug already exists in the database
        if (Category::where('slug', $slug)->exists()) {
            return back()->withErrors(['errors' => 'The category name is already taken.']);
        }

        // Save the category to the database
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // Redirect with a success message
        return redirect()->back()->with('status', 'Category added successfully!');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('status', 'Category Delete Sucessfully');
    }
}
