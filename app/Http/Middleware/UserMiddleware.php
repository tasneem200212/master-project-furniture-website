<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && !auth()->user()->is_admin) {
            return $next($request);
        }
        
        return redirect('/')->with('error', 'Access is restricted to regular users only');
    }
}