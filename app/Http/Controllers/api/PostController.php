<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){

        // $posts = Post::all();
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts); 
    }

    public function store(StorePostRequest $request)
    {
        post::create(
            [
                "title"=>$request->title,
                "body"=>$request->body,
                "user_id"=>$request->user_id,
            ]
            );

        // return $post;
        return new PostResource($post);
    }

    public function show($id){
        $post = Post::find($id);
        return new PostResource($post);
    }
    public function update($id, Request $request){
        $post=post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$request->user_id;
        $post->save();
        return "Done";
    }

    function destroy($id){
        post::destroy($id);
        return "post has been deleted";
    }
}