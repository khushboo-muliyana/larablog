<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
    {
        // Only admins allowed
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }
        
        abort(403, 'Admin access required.');
    }
}
