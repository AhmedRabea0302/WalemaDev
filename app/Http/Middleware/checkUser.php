<?php

namespace App\Http\Middleware;

use Closure;

class checkUser
{

    public function handle($request, Closure $next)
    {
        if(!auth()->guard('normaluser')->user()) {
            return redirect()->route('site.getRegister');
        }
        return $next($request);
    }
}
