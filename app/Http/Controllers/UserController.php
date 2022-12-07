<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index',[
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    // public function store()
    // {
    //     $attributes = request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => 'required|image',
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')]
    //     ]);

    //     $attributes['user_id'] = auth()->id();
    //     $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    //     Post::create($attributes);

    //     return redirect('/');
    // }

    // public function edit(Post $post)
    // {
    //     return view('admin.posts.edit', ['post' => $post]);
    // }

    // public function update(Post $post)
    // {
    //     $attributes = request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => 'image',
    //         'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')]
    //     ]);

    //     if(isset($attributes['thumbnail']))
    //     {
    //         Storage::delete($post->thumbnail);
    //         $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    //     }

    //     $post->update($attributes);

    //     return back()->with('success', 'Post has been updated');
    // }

    // public function destroy(Post $post)
    // {
    //     Storage::delete($post->thumbnail);
    //     $post->delete();

    //     return back()->with('success', 'Post has been Deleted');
    // }
}
