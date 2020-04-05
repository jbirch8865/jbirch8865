<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use app\Facades\Program;
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
        if(!$request->headers->has('Authorization-Token'))
        {
            return Response_422(array('message' => 'The Authorization-Token header is required.'),$request);
        }
        try
        {
            Program::Load_Program_By_Client_ID($request->header('Authorization-Token'));
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return Response_422(array('message' => 'The Authorization-Token is not valid.'),$request);
        }
        $company = new \Company\Company;
        try
        {
            $company->Load_Company_By_ID($request->route('company_id'));
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return Response_422(array('message' => 'The Company '.$request->route('company_id').' does not exist.'),$request);
        }
        return $next($request);
    }
}
