<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Test_Tools\Toolbelt;

class ProgramMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        $toolbelt->Use_Objects()->Get_Program();
        return $next($request);
    }
}
