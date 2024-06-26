<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=["title","body","user_id", "image"];

    function user (){
        return $this->belongsTo(user::class);
    }
    // Post.php
public function comments()
{
    return $this->hasMany(Comment::class);
}
}
