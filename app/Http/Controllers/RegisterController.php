<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades;
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
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:7', 'max:255']
        ]);       
        
        $user = User::create($attributes);

        auth()->login($user);
        //Auth::login($user);

        //session()->flash('success','Your account has been created.');
        return redirect('/')->with('success','Your account has been created.');
    }
}
