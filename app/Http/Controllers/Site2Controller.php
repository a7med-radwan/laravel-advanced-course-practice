<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    function index()
    {
        return view('site2.index');
    }

    function post()
    {
        return view('site2.post');
    }

    function contact()
    {
        return view('site2.contact');
    }

    function about()
    {
        return view('site2.about');
    }

}