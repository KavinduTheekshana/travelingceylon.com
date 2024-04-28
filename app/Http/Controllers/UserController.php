<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {
        $testimonials = DB::table('testimonials')->whereNull('deleted_at')->get();
        return view('backend.pages.profile.profile', ['testimonials' => $testimonials]);
    }

    public function details(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user_details = new User();
        $user_id = $request->input('id');
        $user_details->name = $request->input('name');
        $user_details->phone = $request->input('phone');
        $user_details->address = $request->input('address');


        $data = array(
            'name' => $user_details->name,
            'phone' => $user_details->phone,
            'address' => $user_details->address,
        );

        User::where('id', $user_id)->update($data);
        $user_details->update();
        return redirect()->back()->with('status', 'User Details Updated Sucessfully');
    }


    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user_password = new User();
        $user_id = $request->input('id');
        $user_password->password = Hash::make($request->input('password'));


        $data = array(
            'password' => $user_password->password
        );

        User::where('id', $user_id)->update($data);
        $user_password->update();
        return redirect()->back()->with('status', 'User Details Updated Sucessfully');
    }

    public function picture(Request $request)
    {
        $this->validate($request, [
            'image' => ['required'],

        ]);

        $user_image = new User();
        $user_id = $request->input('id');
    


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profilePath = 'uploads/Profile/'; // upload path
            $profile_image = 'uploads/Profile/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($profilePath, $profile_image);
            $user_image->image = "$profile_image";
        } else {
            $user_image->profile = $user_image;
        }

        $data = array(

            'profile' => $user_image->image,
        );

        User::where('id', $user_id)->update($data);
        $user_image->update();
        return redirect()->back()->with('status', 'Profile Image Updated Sucessfully');
    }

}
