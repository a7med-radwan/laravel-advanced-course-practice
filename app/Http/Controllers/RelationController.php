<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Parser\Reader;

class RelationController extends Controller
{
    function one_to_one() {
        // $user = User::find(1);
        // $insurance = Insurance::where('user_id', $user->id)->first();
        // dd($user->insurance);

        // $insurance = Insurance::find(1);
        // dd($insurance->user);

        $users = User::with('insurance')->get();

        return view('relations.one_to_one' , compact('users'));
    }

    function one_to_many() {
        // $post = Post::find(15);
        // dd($post->comments);
        // $comment = Comment::find(6);
        // dd($comment->post);
        // dd($comment->user);

        $id = 15;
        $post = Post::with('comments', 'comments.user')->where('id', $id)->first();
        return view('relations.one_to_many' , compact('post', 'id'));
    }

    function one_to_many_data(Request $request) {

        // dd($request->all());

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => 3
        ]);

        $post = Post::find($request->post_id);

        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => 3
        ]);

        return redirect()->back();

    }

    function many_to_many() {
        // $std = Student::find (1);
        // dd($std->subjects);

        // $subjects = Subject::find(4);
        // dd($subjects->students);

        $subjects = Subject::all();
        $student = Student::find(1);

        return view('relations.many_to_many', compact('subjects', 'student'));

    }

    function many_to_many_data(Request $request) {
        // dd($request->all());

        $student = Student::find(1);

        // $student->subjects()->attach();//just for add
        // $student->subjects()->detach();//just for delete
        // $student->subjects()->sync(); //do the tow process

        $student->subjects()->sync($request->subjects);


        return redirect()->back();
    }
}
