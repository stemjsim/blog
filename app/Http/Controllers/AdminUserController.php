<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'min:2'],
            'username' => ['required', 'min:5', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','confirmed' , Password::min(7)->mixedCase()->numbers()]
        ]);      

       User::create($attributes);

        return view('admin.users.index',[
            'users' => User::paginate(10)])->with('success', 'A new User has been created!');
    }

    // public function edit(User $user)
    // {
    //     return view('admin.users.edit', ['user' => $user]);
    // }

    // public function update(Post $post)
    // {
    //     $attributes = request()->validate([
    //        
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
