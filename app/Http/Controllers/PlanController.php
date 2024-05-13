<?php

namespace App\Http\Controllers;

use App\Mail\PlanTour;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'number' => ['required'],
        ]);

        $plan = new Plan();
        $plan->name = $request->input('name');
        $plan->email = $request->input('email');
        $plan->country = $request->input('country');
        $plan->number = $request->input('number');
        $plan->date_arrivel = $request->input('arrivel');
        $plan->date_departure = $request->input('departure');
        $plan->adults = $request->input('adults');
        $plan->children = $request->input('children');
        $plan->room_single = $request->input('single');
        $plan->room_double = $request->input('double');
        $plan->meal =$request->input('meal') ? implode(', ', $request->input('meal')): '';
        $plan->hotel =  $request->input('hotel') ?implode(', ', $request->input('hotel')):'';
        $plan->holiday_type = $request->input('holiday') ? implode(', ', $request->input('holiday')):'';
        $plan->like_to_see =  $request->input('likeToSee') ?implode(', ', $request->input('likeToSee')):'';
        $plan->activities =  $request->input('activity') ?implode(', ', $request->input('activity')):'';
        $plan->vehicle =  $request->input('vehicle') ?implode(', ', $request->input('vehicle')):'';
        $plan->note = $request->input('note');

        $plan->save();

        // $plan_mail = $request->input('name');
        // $plan_mail = $request->input('email');
        // $plan_mail = $request->input('country');
        // $plan_mail = $request->input('number');
        // $plan_mail = $request->input('arrivel');
        // $plan_mail = $request->input('departure');
        // $plan_mail = $request->input('adults');
        // $plan_mail = $request->input('children');
        // $plan_mail = $request->input('single');
        // $plan_mail = $request->input('double');
        // $plan_mail =$request->input('meal') ? implode(', ', $request->input('meal')): '';
        // $plan_mail =  $request->input('hotel') ?implode(', ', $request->input('hotel')):'';
        // $plan_mail = $request->input('holiday') ? implode(', ', $request->input('holiday')):'';
        // $plan_mail =  $request->input('likeToSee') ?implode(', ', $request->input('likeToSee')):'';
        // $plan_mail =  $request->input('activity') ?implode(', ', $request->input('activity')):'';
        // $plan_mail =  $request->input('vehicle') ?implode(', ', $request->input('vehicle')):'';
        // $plan_mail = $request->input('note');

        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'number' => $request->input('number'),
            'arrivel' => $request->input('arrivel'),
            'departure' => $request->input('departure'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'single' => $request->input('single'),
            'double' => $request->input('double'),
            'meal' => $request->input('meal', []),
            'hotel' => $request->input('hotel', []),
            'holiday' => $request->input('holiday', []),
            'likeToSee' => $request->input('likeToSee', []),
            'activity' => $request->input('activity', []),
            'vehicle' => $request->input('vehicle', []),
            'note' => $request->input('note'),
        ];

        Mail::to('kavindutheekshana@gmail.com')->send(new PlanTour($formData));




        // Send the email
        // $formData = $request->all();
        // Mail::to('kavindutheekshana@gmail.com')->send(new PlanTour($formData));
        // return redirect('plan')->with('status', 'New Destination Added Sucessfully');
        return response()->json(['success' => 'Your Inquiry Sent Sucessfully']);
    }

    public function list()
    {
        $planes = DB::table('plans')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        return view('backend.pages.plans.plans', ['planes' => $planes]);
    }

    public function read($id)
    {
        $plan = Plan::find($id);
        $plan->read = '0';
        $plan->save();
        return redirect()->back()->with('status', 'Travel Plan Details Mark as Read Sucessfully');
    }
    public function unread($id)
    {
        $plan = Plan::find($id);
        $plan->read = '1';
        $plan->save();
        return redirect()->back()->with('status', 'Travel Plan Details Mark as Unreead Sucessfully');
    }
    public function delete($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect()->back()->with('status', 'Travel Plan Details Delete Sucessfully');
    }
}
