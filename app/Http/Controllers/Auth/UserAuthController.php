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

        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::guard('web')->user()->status === 'blocked') {
                Auth::guard('web')->logout();
                return back()->with('error', 'Your account has been blocked by the administrator.');
            }
            return redirect('/user/dashboard');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}