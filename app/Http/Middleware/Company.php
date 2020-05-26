<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class Company
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
        $toolbelt->Use_Objects()->Get_Company(false);
        return $next($request);
    }
}
