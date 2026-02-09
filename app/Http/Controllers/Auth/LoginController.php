<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->hasRole('Seller')) {
            return '/seller/dashboard';
        }

        if ($user->hasRole('Architect')) {
            return '/architect/dashboard';
        }

        if ($user->hasRole('Admin')) {
            return '/admin/dashboard';
        }

        return '/home'; // fallback
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected array $middleware = [
        'guest' => ['except' => ['logout']],
        'auth' => ['only' => ['logout']],
    ];
}
