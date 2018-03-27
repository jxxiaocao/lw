<?php

namespace App\Http\Middleware;

use Closure;

class AdminSession 
{
    /**  session 判断路由
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('MyUser')))
        {
            return  redirect('backend/login');
        }
        return $next($request);
    }
}
