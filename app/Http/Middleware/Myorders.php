<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;

class Myorders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id)
    {
        if(Sentinel::check()->id == $id)
        return $next($request);
        else
        return redirect('/');
    }
}
