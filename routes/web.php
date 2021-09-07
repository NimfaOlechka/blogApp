<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {   
     
    //ddd($posts[1]->getContents());

    /* return view('posts', [
        'posts' => Post::all()
    ]); */
});

Route::get('/hello', function () {
    return view('hello');
});

/*Route::get('posts/{post}', function ($slug) {
    // Find a post by its slug and pass it to a view called posts
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    //ddd($path);

    if(! file_exists($path)){
        //abort(404);
        //ddd('file does not exist');
        return redirect('/');
    }
    //long form
    $post = cache()->remember("posts.{$slug}", now()->addSeconds(5), function() use($path){
        var_dump('file_get_contents');
        return file_get_contents($path);
    }); 
    //short form
    $post = cache()->remember("posts.{$slug}", 1200, fn()=> file_get_contents($path));
    //$post = file_get_contents($path);
    return view('post', ['post' => $post]);
})->where('posts', '[A-z_\-]+');*/

Route::get('posts/{post}', function ($slug) {
    
    return view('post', [
        'post' => Post::find($slug)]);
    
})->where('posts', '[A-z_\-]+');