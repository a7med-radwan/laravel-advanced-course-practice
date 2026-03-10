<?php

namespace App\Http\Controllers;

use App\Rules\WordCount;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data( Request $requrst)  {
        // dd($requrst->all());
        // dd($requrst->name);
        return 'Welcome '.$requrst->name;
    }

    function form2()  {
        return view('forms.form2');
    }

    function form2_data( Request $request)  {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name','email'));

        // $name = $request->input('name');
        // $name = $request->post('name');


        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $country = $request->country;

        return view('forms.form2_data',compact('name', 'email', 'gender', 'country'));
    }

    function form3() {
        return view('forms.form3');
    }

    function form3_data(Request $request) {

        $request->validate([
            'title' => 'required|min:5|max:30',
            'body' => ['required', new WordCount]
        ],[
            'title.required' => 'هذا الحقل مطلوب يا باشا',
            'min' => 'اكتب اكتر كمان يا حبيبي'
        ]);
        // dd($request->all());
    }

}
