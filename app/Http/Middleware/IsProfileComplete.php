<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(auth('guest')->user()."is user");
        if ($request->user()->is_complete && $request->user()->is_complete=='NOT') {
            
            return redirect()->route('profile.edit');
        }
        return $next($request);
    }
}
