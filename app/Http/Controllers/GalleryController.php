<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'image' => ['required'],
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->input('title');;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'uploads/gallery/'; // upload path
            $gallery_image = 'uploads/gallery/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imagePath, $gallery_image);
            $gallery->image = "$gallery_image";
        } else {
            $gallery->image = 'uploads/destinations/default.jpg';
        }
        $gallery->save();
        return redirect('image-list')->with('status', 'New Image Added Sucessfully');
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
