<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // $githubUser = Socialite::driver('github')->user();
        $githubUser = Socialite::driver('github')->user();
        
        // User firstOrCreate method to check if a user exists
        // Creating a new user or logging in.
        $user = User::firstOrCreate(
            [
                //Check if user exists, login if exists
                'provider_id' => $githubUser->getId(),
            ],
            [
                // Add all 3 into table if not exists
                'email' => $githubUser->getEmail(),
                'name' => $githubUser->getName(),
                ]
            );
            
            // Log the user in
            auth()->login($user, true);
            
            // Redirect to dashboard
            return redirect('/')->with('success', 'You are now logged in with Github');
        }
    }

    //     // dd($user);
    //     Pre research for useOrCreate method code example
    //
    //     $user = User::where('provider_id', $githubUser->getId())->first();
    //     // Create a user from github details
    //    if(! $user){
    //         $user = User::create([
    //             'email' => $githubUser->getEmail(),
    //             'name' => $githubUser->getName(),
    //             'provider_id' => $githubUser->getId(),
    //         ]);
    //     }