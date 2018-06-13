<?php

namespace App\Http\Middleware;

use Closure;

class ProfileMiddleWare
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
//        $request->mode = ;
        $url = $request->url();
        $url = explode("/", $url);
        $request -> mode = $url[5];
        $request -> userType = $url[3];
//        dd($url);
        return $next($request);
    }
}
