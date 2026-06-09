<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('web')->check()) {
            return redirect('/user/login');
        }

        if (Auth::guard('web')->user()->status === 'blocked') {
            Auth::guard('web')->logout();
            return redirect('/user/login')->with('error', 'Your account has been blocked by the administrator.');
        }

        return $next($request);
    }
}