<?php

namespace App\Http\Middleware;

// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin')) {
            return redirect('/admin/login')->withErrors(['message' => 'يجب أن تكون مسجلاً كمسؤول للوصول إلى لوحة التحكم']);
        }

        // Allow the request to proceed if the user is an admin
        return $next($request);
    }
}