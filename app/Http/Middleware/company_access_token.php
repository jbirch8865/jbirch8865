<?php

namespace App\Http\Middleware;

use Closure;

class company_access_token
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
        $toolbelt = new \Test_Tools\toolbelt;
        $toolbelt->Get_Company();
        return $next($request);
    }
}
