<?php

namespace App\Http\Controllers\api;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
    $users = user::all();
        
    return UserResource::collection($users); 
    // return $users; 
    }
}
