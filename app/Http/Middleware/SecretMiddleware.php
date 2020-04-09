<?php

namespace App\Http\Middleware;

use Closure;
use app\Facades\Programs;
use app\Facades\Program;
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
        if(!$request->headers->has('Secret-Token'))
        {
            return Response_422(['message' => 'The Secret header with secret Secret-Token is required.'],$request);
        }
        if(strlen($request->header('Secret-Token')) > Programs::Get_Column('secret')->Get_Data_Length())
        {            
            return Response_422(['message' => 'Secret-Token is malformed.'],$request);
        }
        if($request->header('Secret_Token') == Program::Get_Secret())
        {
            $toolbelt = new \toolbelt;
            if($toolbelt->cConfigs->Is_Prod() && $request->header('Secret_Token') == $toolbelt->cConfigs->Get_Secret_ID())
            {
                return Response_401(['message' => 'Sorry this client id/secret is only allowed in the sandbox environment.'],$request);
            }
            return $next($request);
        }else
        {
            return Response_401(['message' => 'Secret_Token is incorrect.'],$request);
        }
    }
}
