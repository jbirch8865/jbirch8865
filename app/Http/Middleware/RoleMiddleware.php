<?php

namespace App\Http\Middleware;
use app\Facades\Route;
use app\Facades\Program_Session;
use app\Facades\User_Roles;
use app\Helpers\Route as HelpersRoute;
use Closure;

class RoleMiddleware
{

    public function handle($request, Closure $next)
    {
        if (!Route::Am_I_Implicitly_Allowed()) 
        {
            $session = app()->make('Program_Session');
            $user_roles = $session->Users_Have_Roles;
            $method = $request->method();
            ForEach($user_roles as $user_role)
            {
                $route_has_role = new \app\Helpers\Route_Role;
                $route_has_role->Load_From_Route_And_Role(app()->make('Route'),$user_role->Company_Roles);
                if($route_has_role->Rights->Is_Method_Allowed($method))
                {
                    return $next($request);                    
                }
            }
            return Response_401(['message'=>'Sorry the user is not allowed to access this route with this method.'],$request);
        }
        return $next($request);                    
    }
}
