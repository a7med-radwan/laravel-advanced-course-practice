<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function home(){
        return 'Home Page';
    }
    function about(){
        return 'About Page';
    }
    function contact(){
        return 'Contact Page';
    }
}