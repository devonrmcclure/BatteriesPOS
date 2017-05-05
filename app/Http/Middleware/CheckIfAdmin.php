<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if ($request->ajax() || $request->wantsJson()) {
            if(Auth::guard('api')->user()->admin) {
                return $next($request);
            } else {
                return response('Unauthorized.', 401);
            }
        } else {
            if(Auth::user()->admin) {
                return $next($request);
            } else {
                return redirect()->guest('login');
            }
        }

    }
}
