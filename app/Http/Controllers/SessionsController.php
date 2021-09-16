<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');        
        
    }

    public function store()
    {
        $attributes = request()->validate([       
            'email' => 'required|email',
            'password' => ['required']
        ]);       
        
        if(!auth()->attempt($attributes))
        {
             //return back()->withInput()->withErrors(['fail'=> 'Your provided credentials could not be verified']); - option 1
            throw ValidationException::withMessages(['fail'=> 'Your provided credentials could not be verified']);
        }
       
        session()->regenerate();
        return redirect('/')->with('success','You have succesfully logged in.');
        
    }


    public function destroy()
    {
        //ddd('log the user out');
        auth()->logout();
        return redirect('/')->with('success', 'See you soon!');
    }
}
