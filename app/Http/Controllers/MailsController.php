<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    function send_mail()
    {
        Mail::to('admin@gmail.com')->send(new TestMail);
        // return view();
    }
    function contact_us()
    {
        return view('forms.contact_us');
    }

    function contact_us_data( Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
            'message' => 'required',
        ]);

        $img_name= rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);

        Mail::to('contact@gmail.com')->send(new ContactUsMail($request->except('_token'), $img_name));
    }
}
