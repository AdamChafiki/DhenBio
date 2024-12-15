<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not logged in or not an admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            // Redirect to the login page with an error message
            return redirect('/admin/login')->withErrors(['message' => 'يجب أن تكون مسجلاً كمسؤول للوصول إلى لوحة التحكم']);
        }

        // Allow the request to proceed if the user is an admin
        return $next($request);
    }
}