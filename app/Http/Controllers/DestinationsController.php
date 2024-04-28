<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

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
            'slug' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        $destinations = new Destinations();
        $destinations->title = $request->input('title');
        $destinations->slug = $request->input('slug');
        $destinations->location = $request->input('location');
        $destinations->category = $request->input('category');
        $destinations->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/destinations/'; // upload path
            $destination_image = 'uploads/destinations/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $destination_image);
            $destinations->image = "$destination_image";
        } else {
            $destinations->image = 'uploads/destinations/default.jpg';
        }
        $destinations->save();
        return redirect('add-destinations')->with('status', 'New Destination Added Sucessfully');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);

        $destinations = new Destinations();
        $destinations_id = $request->input('id');
        $destinations->title = $request->input('title');
        $destinations->slug = $request->input('slug');
        $destinations->location = $request->input('location');
        $destinations->category = $request->input('category');
        $destinations->description = $request->input('description');

        $single_destination = Destinations::find($destinations_id);
        $destinations_url = $single_destination->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/destinations/'; // upload path
            $destination_image = 'uploads/destinations/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $destination_image);
            $destinations->image = "$destination_image";
        } else {
            $destinations->image = $destinations_url;
        }

        $data = array(
            'title' => $destinations->title,
            'slug' => $destinations->slug,
            'location' => $destinations->location,
            'category' => $destinations->category,
            'description' => $destinations->description,
            'image' => $destinations->image,
        );

        //   dd($data);
        Destinations::where('id', $destinations_id)->update($data);
        $destinations->update();
        return redirect('destinations-list')->with('status', 'Destination Updated Sucessfully');
    }
}
