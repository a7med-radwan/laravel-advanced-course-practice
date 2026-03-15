<?php

namespace App\Http\Controllers;

use App\Rules\WordCount;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    function form1()
    {
        return view('forms.form1');
    }

    function form1_data(Request $requrst)
    {
        // dd($requrst->all());
        // dd($requrst->name);
        return 'Welcome ' . $requrst->name;
    }

    function form2()
    {
        return view('forms.form2');
    }

    function form2_data(Request $request)
    {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name','email'));

        // $name = $request->input('name');
        // $name = $request->post('name');


        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $country = $request->country;

        return view('forms.form2_data', compact('name', 'email', 'gender', 'country'));
    }

    function form3()
    {
        return view('forms.form3');
    }

    function form3_data(Request $request)
    {

        $request->validate([
            'title' => 'required|min:5|max:30',
            'body' => ['required', new WordCount]
        ], [
            'title.required' => 'هذا الحقل مطلوب يا باشا',
            'min' => 'اكتب اكتر كمان يا حبيبي'
        ]);
        // dd($request->all());
    }

    function form4()
    {
        return view('forms.form4');
    }

    function form4_data(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'cv' => 'required|file|mimes:pdf|max:148',
        ]);
        // Facebook Naming Conveuant
        $ex = $request->file('cv')->getClientOriginalExtension();
        $alpha = range('a', 'd');
        $name = time() . '_' . rand(000000000000000, 999999999999999) . '_' . rand() . '_' .
            $alpha[rand(0, count($alpha) - 1)] . '.' . $ex;


        // $name = rand().time().$request->file('cv')->getClientOriginalName();
        $request->file('cv')->move(public_path('uploads/cv'), $name);
        // dd($request->all());
    }
    function form5()
    {
        return view('forms.form5');
    }

    function form5_data(Request $request)
    {
        return now()->format('d-m-Y h:i:s a');
    }
}
