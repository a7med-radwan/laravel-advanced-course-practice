<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    function index()
        {
            $title = 'Ahmed H Radwan';
            $desc = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Impedit in dolor nihil consectetur aspernatur iste voluptatibus aut
                        laborum aperiam veniam.';
            // return view('index')->with(['title'=>$title , 'desc'=>$desc]);
            return view('index', compact('title','desc'));
            // return view('index',[
            //     'title'=>$title,
            //     'desc'=>$desc
            //     ]
            // );
        }
    }