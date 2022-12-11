<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'posts' => Post::where('user_id', Auth::user()->id)->latest()->paginate(10)
        ]);
    }


    public function edit(User $user)
    {
        // ddd(request()->all());    
        return view('users.edit', ['user' => $user]);
    }
}
