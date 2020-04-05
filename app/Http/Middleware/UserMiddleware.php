<?php

namespace App\Http\Middleware;
use app\Facades\Program_Session;
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
        if(!strpos($request->route()->getName(),'ATNR'))
        {
            if(!$request->headers->has('User-Access-Token'))
            {
                return Response_422(['message' => 'The User-Access-Token header is required.'],$request);
            }
            try
            {
                Program_Session::Load_Session_By_Access_Token($request->header('User-Access-Token'));
                if(Program_Session::Is_Expired())
                {
                    return Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                        'href' => route('Signin_User'),
                        'type' => 'POST'
                    ]],$request);
                }
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_422(['message' => 'The User-Access-Token is not valid.'],$request);
            }
        }
        return $next($request);
    }
}
