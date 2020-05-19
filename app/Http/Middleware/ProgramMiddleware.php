<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Test_Tools\Toolbelt;

class ProgramMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $toolbelt = new Toolbelt;
        if($request->isJson()) {
            if(empty($request->json()->all())) {
                return $toolbelt->functions->Response_400(['message','invalid json request.'],$request);
            }
        }
        global $first_run;
        $first_run = true;
        $toolbelt = new \Test_Tools\toolbelt;
        $toolbelt->objects->Get_Program();
        return $next($request);
    }
}
