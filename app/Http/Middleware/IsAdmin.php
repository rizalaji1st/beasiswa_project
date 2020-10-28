<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user() && Auth::user()->hasAnyRoles == 'ADMINUNVERSITAS') {
            return $next($request);
        }

        else if(Auth::user() && Auth::user()->roles == 'ADMINFAKULTAS') {
            return redirect('/adminfakultas');
        }
        return redirect('/');
    }
}
