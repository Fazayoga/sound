<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        // Logika otentikasi admin di sini
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
