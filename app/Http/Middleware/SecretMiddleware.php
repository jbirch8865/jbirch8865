<?php

namespace App\Http\Middleware;

use Closure;
use app\Facades\Programs;
use app\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class SecretMiddleware
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
        $name = Route::Get_Current_Route_Name();
        if(!$request->headers->has('secret-token'))
        {
            return Response_422(['message' => 'The secret-token header is required.'],$request);
        }
        if(strlen($request->header('secret-token')) > Programs::Get_Column('secret')->Get_Data_Length())
        {
            return Response_422(['message' => 'secret-token is malformed.'],$request);
        }
        $program = app()->make('Program');
        if($request->header('secret-token') == $program->Get_Secret())
        {
            $toolbelt = new \toolbelt;
            if($toolbelt->cConfigs->Is_Prod() && $request->header('secret-token') == $toolbelt->cConfigs->Get_Secret_ID())
            {
                return Response_401(['message' => 'Sorry this client-id/secret-token is only allowed in the sandbox environment.'],$request);
            }
            return $next($request);
        }else
        {
            return Response_401(['message' => 'secret-token is incorrect.'],$request);
        }
    }
}
