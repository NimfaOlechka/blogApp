<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{    

    public function index() 
    {
        //die('hello');  
        //dd(request(['search']));
        //dd(request()->only('search'));
        return view('posts', [
                'posts'=> Post::latest()->filter(request(['search']))->get(),
                'categories'=>Category::all()
            
        ]);   

    }

    public function show(Post $post) 
    {
        return view('post', [
            'post' => $post
        ]);
    }
}