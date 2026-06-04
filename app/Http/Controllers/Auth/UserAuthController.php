<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.user-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role !== 'user') {
                Auth::logout();

                return back()->with(
                    'error',
                    'You are not a User'
                );
            }

            return redirect('/user/dashboard');
        }

        return back()->with(
            'error',
            'Invalid Credentials'
        );
    }
}