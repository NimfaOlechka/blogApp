<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

Route::get('/', [ PostController::class, 'index'])->name('home');

Route::get('/hello', function () {
    return view('hello');
});

Route::get('posts/{post:slug}', [ PostController::class, 'show']);

/* Route::get('categories/{category:slug}', function (Category $category)
{
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category'); */

/* Route::get('authors/{author:username}',function(User $author)
{
    return view('posts.index', [
        'posts' => $author->posts
    ]);

}); */