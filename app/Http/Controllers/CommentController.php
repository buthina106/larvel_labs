<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
