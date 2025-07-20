<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsWriter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
    {
        // Allow writers AND admins
        if (auth()->user()->role === 'writer' || auth()->user()->role === 'admin') {
            return $next($request);
        }
        
        abort(403, 'Only writers can access this page.');
    }
}
