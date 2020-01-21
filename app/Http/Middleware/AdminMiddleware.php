<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\Authenticatable;

class AdminMiddleware
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
        if ($request->user()->hasAnyPermission('後台管理')) {
        // if ($request->user()){
            return $next($request);

        }
        // elseif($request->user()->hasAnyPermission('建立測驗')) {
        //     // dd($next->call());
        //     return $next($request);
        // }
        // dd(Auth::guard()->user()->name);
        // dd(get_class_methods(Auth::guard()->user()->roles()));
        abort(403);
    }
}
