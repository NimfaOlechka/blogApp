<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function destroy()
    {
        //ddd('log the user out');
        auth()->logout();
        return redirect('/')->with('success', 'See you soon!');
    }
}
