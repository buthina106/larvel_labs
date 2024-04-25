<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use  App\Http\Requests\storePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);

        return view("posts.index", ["posts" => $posts]);
    }

    function create(){
        return view('posts.create');
    }

    function store(storePostRequest $request){
        //validation
        // $post = new Post;
        // $post->title = $request->title;
        // $post->body =$request->body;
        // $post->save();
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
        }
        post::create(
            [
                "title"=>$request->title,
                "body"=>$request->body,
                "user_id"=>$request->user_id,
                'image' => $imageName
            ]
            );
        return redirect("/posts");
    }



    function show($id){
        $post = Post::find($id);
        return view("posts.show", ["post" => $post]);
    }
     

    function edit($id){
        $post = Post::find($id);
return view("posts.edit",["post"=>$post]);
}

public function update($id, Request $request){
    $post=post::find($id);
    $post->title=$request->title;
    $post->body=$request->body;
    $post->user_id=$request->user_id;
    $post->save();
    return redirect("/posts");
}
function destroy($id){
    post::destroy($id);
    return redirect("/posts");
}
}
