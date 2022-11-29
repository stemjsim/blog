<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        request()->validate(['email' => 'required|email' ]);

    try 
    {
        $newsletter->subscribe(request('email'));

    } catch (Exception $e ) {
       throw \Illuminate\Validation\ValidationException::withmessages([
            'email' => 'This email was unable to be added. Please try again'
            // 'email' => ddd($e)
        ]);
    }

    return redirect('/')->with('success', 'You are now signed up');
    }
}
