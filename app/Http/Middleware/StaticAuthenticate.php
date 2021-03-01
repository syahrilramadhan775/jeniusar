<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaticAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('logged'))
            return redirect()->route('login');

        return $next($request);
    }
}
