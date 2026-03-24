<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::simplePaginate(20);
        // $posts = Post::latest('id')->get();
        // $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::orderByDesc('id')->get();
        // $posts = Post::select('title', 'body')->take(5)->get();
        // $posts = Post::find(20);
        // $posts = Post::where("id", 20)->first();
        // dd($posts);

        // dump(request()->all());
        $count = 20;
        if(request()->has('count')){
            $count = request()->count;
        }

        if(request()->has('count') && request()->count == 'all'){
            $count = Post::count();
        }

        if (request()->has('search')) {
            $posts = Post::Where('title', 'like', '%' . request()->search . '%')
            ->orWhere('body', 'like', '%' . request()->search . '%')
            ->orderByDesc('id')->paginate($count);
        }else{
            $posts = Post::orderByDesc('id')->paginate($count);
        }
        return view('posts.index', compact('posts'));
    }
}