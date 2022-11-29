<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //dd(request()->all());
        // //validate
        request()->validate([
            'body' => 'required'
        ]);

        // //add comment to post
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        // //redirect
        return back();
    }
}
