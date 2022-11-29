<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('register.create');
    }

    public function store() 
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:5'],
            'username' => ['required', 'min:5', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        $user = User::create($attributes);

        //Login the user after signup
        auth()->login($user);

        return redirect('/')->with('success', 'You have successfully registered your account :)');
    }
}
