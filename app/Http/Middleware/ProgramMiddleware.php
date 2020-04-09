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
        $request->validate([
            'limit' => ['lte:100','gte:1'],
            'details_limit' => ['lte:25','gte:1'],
            'offset' => ['gte:0'],
            'details_offset' => ['gte:0'],
            'include_details' => ['gte:0','lte:5']
        ]);
        return $next($request);
    }
}
