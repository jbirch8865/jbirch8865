<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ProgramMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        $toolbelt->Get_Program();
        return $next($request);
    }
}
