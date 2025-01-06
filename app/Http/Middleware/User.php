<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki role 'user'
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request); // Lanjutkan jika user
        }

        // Redirect ke home jika bukan user
        return redirect('/home');
    }
}
