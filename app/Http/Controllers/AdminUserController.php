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

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'min:2',
            'username' => ['min:5', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => [ 'email', Rule::unique('users','email')->ignore($user->id)]
        ]);

        if(isset($attributes['password']))
        {
            $attributes['password'] = ['confirmed' , Password::min(7)->mixedCase()->numbers()];
        }

        $user->update($attributes);

        return back()->with('success', 'User has been updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User has been Deleted');
    }
}
