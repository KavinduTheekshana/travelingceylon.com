<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $testimonials = DB::table('testimonials')->whereNull('deleted_at')->get();
        return view('backend.pages.testimonial.testimonial_list', ['testimonials' => $testimonials]);
    }

    public function add()
    {
        return view('backend.pages.testimonial.testimonial_add');
    }
    public function active($id)
    {
        $testimonials = Testimonial::find($id);
        $testimonials->status = '1';
        $testimonials->save();
        return redirect()->back()->with('status', 'Testamonial Activated Sucessfully');
    }
    public function diactive($id)
    {
        $testimonials = Testimonial::find($id);
        $testimonials->status = '0';
        $testimonials->save();
        return redirect()->back()->with('status', 'Testamonial Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $testimonials = Testimonial::find($id);
        $testimonials->delete();
        return redirect()->back()->with('status', 'Testamonial Delete Sucessfully');
    }
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'star' => ['required'],
            'comment' => ['required'],
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->input('name');
        $testimonial->star = $request->input('star');
        $testimonial->comment = $request->input('comment');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $testimonialPath = 'uploads/testimonial/'; // upload path
            $testimonila_image = 'uploads/testimonial/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($testimonialPath, $testimonila_image);
            $testimonial->image = "$testimonila_image";
        } else {
            $testimonial->image = 'uploads/destinations/default.jpg';
        }
        $testimonial->save();
        return redirect('testimonial-list')->with('status', 'New Testamonial Added Sucessfully');
    }
}
