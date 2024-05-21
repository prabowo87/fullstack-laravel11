<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\ResponseApiTrait;

class IsOtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    use ResponseApiTrait;
    public function handle(Request $request, Closure $next): Response
    {
        // dd(auth('guest')->user()."is user");
        $is_api_request = in_array('api',$request->route()->getAction('middleware'));
        if ($request->user() && $is_api_request) {
            
            return $this->error( "User Not Verified Yet",402 );
        }
        return $next($request);
    }
}
