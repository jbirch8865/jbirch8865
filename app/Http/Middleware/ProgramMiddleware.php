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
        if(!$request->headers->has('Authorization'))
        {
            return response()->json([
                'message' => 'The Authorization header with client_id is required.'
            ],400);
        }
        $program = new \API\Program();
        try
        {
            $program->Load_Program_By_Client_ID($request->header('Authorization'));
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return response()->json([
                'message' => 'The client id is not valid.'
            ],400);
        }
        return $next($request);
    }
}
