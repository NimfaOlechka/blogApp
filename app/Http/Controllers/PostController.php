<?php

namespace App\Http\Controllers;

use App\Models\{User, Category, Post};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
//use Illuminate\Support\Facades\DB;

class PostController extends Controller
{    

    public function allPosts() 
    {
        //die('hello');  
        //dd(request(['search']));
        //dd(request()->only('search'));
        //request()->user()->can('admin);
        //dd(Gate::allows('admin'));
        //$this->authorize('admin');
        return view('posts.index', [
               'posts'=> Post::latest()->filter(
                   request(['search', 'category', 'author'])
                )->paginate(6)->withQueryString()
            
        ]);    

    }

    /* public function blogFeed()
    {
        //show only posts with status 'published'
        //all filters and search requests should work too
      
       
        //dd( $posts);
        return view('posts.index', [
            'posts' => Post::where('status', 2)->paginate(5)
        ]);


    } */
    public function index()
    {
        //show only posts with status 'published'
        //all filters and search requests should work too      
       
        //dd( $posts);
        return view('posts.index', [
            'posts' => Post::published()
                        ->filter(request(['search', 'category', 'author']))
                        ->paginate(5)
                        ->withQueryString()
        ]);


    }

    public function show(Post $post) 
    {
        dd($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }    

    
}