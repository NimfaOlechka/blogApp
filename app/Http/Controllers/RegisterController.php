<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades;
use App\Models\User;
use Illuminate\Support\Facades\Password;

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

    public function passwordRequest()
    {
        return view('register.forgot-password');
    }

    public function passwordReset($token)
    {
        return view('register.forgot-password', [
            'token' => $token
        ]);
    }

    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'            
        ]);

        $status = Password::sendResetLink(($request->only('email')));

        return $status === Password::RESET_LINK_SENT 
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                
                $user->save();
    
                event(new PasswordReset($user));
    
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    :back()->withErrors(['email' => [__($status)]]);
                    
    }
}
