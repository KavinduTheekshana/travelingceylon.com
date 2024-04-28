<?php

namespace App\Http\Controllers;

use App\Models\PackageDetails;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackageDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'day' => ['required', 'numeric', 'max:255'],
            'package_id' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        $package_id=$request->input('package_id');

        $package_details = new PackageDetails();
        $package_details->title = $request->input('title');
        $package_details->package_id = $request->input('package_id');
        $package_details->location = $request->input('location');
        $package_details->day = $request->input('day');
        $package_details->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $packageDetailsPath = 'uploads/packages/details/'; // upload path
            $package_details_image = 'uploads/packages/details/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($packageDetailsPath, $package_details_image);
            $package_details->image = "$package_details_image";
        } else {
            $package_details->image = 'uploads/destinations/default.jpg';
        }
        $package_details->save();
        return redirect('/package-details-list/'.$package_id)->with('status', 'New package Details Added Sucessfully');
    }

    public function active($id)
    {
        $package = PackageDetails::find($id);
        $package->status = '1';
        $package->save();
        return redirect()->back()->with('status', 'Package Activated Sucessfully');
    }
    public function diactive($id)
    {
        $package = PackageDetails::find($id);
        $package->status = '0';
        $package->save();
        return redirect()->back()->with('status', 'Package Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $package = PackageDetails::find($id);
        $package->delete();
        return redirect()->back()->with('status', 'Package Delete Sucessfully');
    }
    public function update_view($id)
    {
        $package_details = PackageDetails::find($id);
        $tpackage_id = $package_details->package_id;
        $package = Packages::find($tpackage_id);

        return view('backend.pages.packages.details_update', ['package_details' => $package_details,'package'=>$package]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'day' => ['required', 'numeric', 'max:255'],
            'description' => ['required'],
        ]);

        $package_details = new PackageDetails();
        $package_details_id = $request->input('id');
        $package_details->title = $request->input('title');
        $package_details->location = $request->input('location');
        $package_details->day = $request->input('day');
        $package_details->description = $request->input('description');

        $package_id = $request->input('package_id');
        $single_package_details = PackageDetails::find($package_details_id);
        $package_url = $single_package_details->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $packagePath = 'uploads/packages/details/'; // upload path
            $package_image = 'uploads/packages/details/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($packagePath, $package_image);
            $package_details->image = "$package_image";
        } else {
            $package_details->image = $package_url;
        }

        $data = array(
            'title' => $package_details->title,
            'location' => $package_details->location,
            'day' => $package_details->day,
            'description' => $package_details->description,
            'image' => $package_details->image,
        );

        PackageDetails::where('id', $package_details_id)->update($data);
        $package_details->update();
        return redirect('/package-details-list/'.$package_id)->with('status', 'Package Details Updated Sucessfully');
    }
}
