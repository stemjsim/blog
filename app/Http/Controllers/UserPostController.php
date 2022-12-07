<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{

    public function create()
    {
        return view('users.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return view('users.index',[
            'posts' => Post::where('user_id', Auth::user()->id)->paginate(10)
        ])->with('success', 'A new Post has been Created');
    }

    public function edit(Post $post)
    {
        return view('users.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if(isset($attributes['thumbnail']))
        {
            Storage::delete($post->thumbnail);
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return view('users.index',['posts' => Post::where('user_id', Auth::user()->id)->paginate(10)])->with('success', 'Post has been updated');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->delete();

        return back()->with('success', 'Post has been Deleted');
    }
}
