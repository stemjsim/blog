<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //Log in details to check
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //authorise and login
        if (auth()->attempt($attributes))
        {
            session()->regenerate();

            return redirect('/')->with('success', 'Hi, welcome!');
        };

        // if authentication fails
        return back()
        ->withInput()
        ->withErrors(['email' => 'Details unable to be verified.']);
        
        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You are now logged out...');
    }
    
}
