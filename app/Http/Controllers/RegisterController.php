<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => ['required', 'min:7', 'max:255']
        ]);       
        
        User::create($attributes);
        return redirect('/');
    }
}
