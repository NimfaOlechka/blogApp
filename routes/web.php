<?php

use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
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
    
    $posts = Post::all();
    return view('posts', ['posts'=> $posts]);
   
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('posts/{post}', function ($slug) {
    
    $post = Post::findOrFail($slug);    
    return view('post', [
        'post' => $post]);
    
});
