<?php

namespace App\Http\Middleware;

use Closure;

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
        // dd($request->user());
        if ($request->user()->hasAnyPermission('後台管理')) {
        // if ($request->user()){
            abort(403);
        }

        return $next($request);
    }
}
