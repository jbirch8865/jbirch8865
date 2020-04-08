<?php

namespace App\Http\Middleware;
use app\Facades\Program_Session;
use app\Facades\Route;
use Closure;

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
            $session = app()->make('Program_Session');
            if(!$session instanceof \API\Program_Session)
            {
                return $session;
            }
        }
        
        return $next($request);
    }
}
