<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use app\Facades\Program;
use app\Facades\Programs;
use app\Facades\Company;
class ProgramMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {            
        $program = app()->make('Program');
        if(!$program instanceof \API\Program)
        {
            return $program;
        }
        return $next($request);
    }
}
