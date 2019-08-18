<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
        if (Auth::check() && Auth::user()->role == 'moderator') {
            return('/moderator');
        }
        elseif (Auth::check() && Auth::user()->role == 'tsm') {
            return('/tsm');
        }
        elseif (Auth::check() && Auth::user()->role == 'accounts') {
            return('/accounts');
        }
        elseif (Auth::check() && Auth::user()->role == 'viewer') {
            return('/viewer');
        }
        else {
            return('/admin');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

}
