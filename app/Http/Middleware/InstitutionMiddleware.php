<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstitutionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = 'institution')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/institution/login');
        }
        Auth::shouldUse('institution');
        return $next($request);
    }
}
