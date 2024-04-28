<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'comment' => ['required'],
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->comment = $request->input('comment');

        $contact->save();
        
    
        // Send the email
        $formData = $request->all();
        Mail::to('thushaniwerahera@gmail.com')->send(new ContactForm($formData));

        return response()->json(['success' => 'Your Message Sent Sucessfully']);
    }

    public function list()
    {
        $contacts = DB::table('contacts')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        return view('backend.pages.contact.contact', ['contacts' => $contacts]);
    }

    public function read($id)
    {
        $Booking = Contact::find($id);
        $Booking->read = '0';
        $Booking->save();
        return redirect()->back()->with('status', 'Contact Form Details Mark as Read Sucessfully');
    }
    public function unread($id)
    {
        $Booking = Contact::find($id);
        $Booking->read = '1';
        $Booking->save();
        return redirect()->back()->with('status', 'Contact Form Details Mark as Unreead Sucessfully');
    }
    public function delete($id)
    {
        $Booking = Contact::find($id);
        $Booking->delete();
        return redirect()->back()->with('status', 'Contact Form Details Delete Sucessfully');
    }

}
