<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role !== 'admin') {
                Auth::logout();

                return back()->with(
                    'error',
                    'You are not an Admin'
                );
            }

            return redirect('/admin/dashboard');
        }

        return back()->with(
            'error',
            'Invalid Credentials'
        );
    }
}