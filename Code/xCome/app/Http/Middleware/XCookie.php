<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class XCookie
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
//        dd($request);
        if ($request->cookie('x_user_cookie')){


            $entry = DB::table('x_cookies')->where('token', '=', $request->cookie('x_user_cookie'))->first();
//            dd($entry);
            $request->x_user_id = $entry->user_id;
        }

//        else {
////            dd($request);
//            return redirect(route("User.showLogin"));
//        }


        return $next($request);
    }
}
