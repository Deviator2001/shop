<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;

class Allorders
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
        if(Sentinel::guest()) return redirect('login');
        if(Sentinel::inRole('manager')) return $next($request);
        return Redirect::back();
    }
}
