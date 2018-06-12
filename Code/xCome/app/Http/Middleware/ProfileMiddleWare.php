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
        $url = explode("/", $url)[4];
        $request -> mode = $url;
//        dd($url);
        return $next($request);
    }
}
