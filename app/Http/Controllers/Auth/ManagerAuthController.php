<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.manager-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role !== 'manager') {
                Auth::logout();

                return back()->with(
                    'error',
                    'You are not a Manager'
                );
            }

            return redirect('/manager/dashboard');
        }

        return back()->with(
            'error',
            'Invalid Credentials'
        );
    }
}