<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Payment;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [  ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function setUsernameAttribute($username)
    {
        return ucwords($username); // accessor
    } */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts (){
        return $this->hasMany(Post::class);
    }

    public function comments (){
        return $this->hasMany(Comment::class);
    }
}
