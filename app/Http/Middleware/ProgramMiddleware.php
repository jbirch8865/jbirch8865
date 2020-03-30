<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use \Illuminate\Http\Request;
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
            return response()->json([
                'message' => 'The Authorization-Token header is required.'
            ],422);
        }
        $program = new \API\Program();
        try
        {
            $program->Load_Program_By_Client_ID($request->header('Authorization-Token'));
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return response()->json([
                'message' => 'The Authorization-Token is not valid.'
            ],422);
        }
        return $next($request);
    }
}
