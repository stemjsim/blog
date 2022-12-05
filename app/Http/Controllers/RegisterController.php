<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('register.create');
    }

    public function store() 
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:2'],
            'username' => ['required', 'min:5', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','confirmed' , Password::min(7)->mixedCase()->numbers()]
        ]);
        // Password rules can add symbols() after numbers to require a symbol as well
        // Can add uncompromised() to check haveibeenpwned.com can add number to set min amount of times compromised before rejection

        $user = User::create($attributes);

        //Login the user after signup
        auth()->login($user);

        return redirect('/')->with('success', 'You have successfully registered your account :)');
    }
}
