<?php

namespace App\Http\Controllers;

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
}
