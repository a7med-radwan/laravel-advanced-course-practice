<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site3Controller extends Controller
{
    function about(){
        return view('site3.about');
    }

    function experience(){
        return view('site3.experience');
    }

    function education(){
        return view('site3.education');
    }

    function skills(){
        return view('site3.skills');
    }

    function interests(){
        return view('site3.interests');
    }

    function awards(){
        return view('site3.awards');
    }

}
