<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user()->username;
        return view('admin.posts.index', [
            'posts' => Post::paginate(25)
        ]);
    }

    public function create()
    {
        /* if(auth()->guest())
        {
            abort(Response::HTTP_FORBIDDEN);
        } */
        return view('admin.posts.create');
    }

    public function edit(Post $post)
    {        
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function store()
    {
        //ddd(request()->all());
        //ddd(request()->file('thumbnail'));

       /*  request()->file('thumbnail')->store('thumbnails');
        return 'done'; */
        
        /* $attributes = $this->validatePost(); 

        //ddd($attributes);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails'); */

        $attributes = array_merge($this->validatePost(), [
            'user_id' => request('user_id'),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        //ddd($attributes);
        //request()->user()->posts()->create();
        Post::create($attributes);
        return redirect('/')->with('success','Your post is published.');
    }

    public function update(Post $post)
    {       
         $attributes = $this->validatePost($post); 
        
        if($attributes['thumbnail'] ?? 'false')
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'slug' => ['required',Rule::unique('posts', 'slug')->ignore($post)],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]); 
    }
}
