<?php

namespace App\Http\Middleware;
use app\Facades\Program_Session;
use app\Facades\Route;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
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
        if(!Route::Am_I_Implicitly_Allowed())
        {
            app()->make('Program_Session');
        }

        return $next($request);
    }
}
