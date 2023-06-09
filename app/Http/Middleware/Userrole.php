<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Userrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  
    public function handle($request,Closure $next,string $role)
    {
        if (! $request->user()->role===$role) {
            abort(403);
        }
        else return $next($request);
    }
}
