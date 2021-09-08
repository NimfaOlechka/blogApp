<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    //protected $guarded = ['id'];// everything except this one
    //protected $fillable = ['title', 'excerpt', 'body', 'slug']; // allowed to be mass assigned
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
