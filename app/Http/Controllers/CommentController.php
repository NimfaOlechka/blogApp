<?php

namespace App\Http\Controllers;
use App\Models\{User, Post, Category, Comment};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Post $post)
    {
        //dd($post);
        //validate
        request()->validate([
            'body' => 'required'
        ]);

        //save
        $post->comments()->create([
            'user_id' => request()->user()->id, 
            'body' => request('body')
        ]);

        return back();

    }
}
