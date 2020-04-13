<?php

namespace App\Http\Middleware;
use app\Facades\Route;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle($request, Closure $next)
    {
        if (!Route::Am_I_Implicitly_Allowed())
        {
            $session = app()->make('Program_Session');
           if($session instanceof Response){return $session;}
            $user_roles = $session->Users_Have_Roles;
            $method = $request->method();
            ForEach($user_roles as $user_role)
            {
                $route_has_role = app()->make('Route_Has_Role');
                if($route_has_role instanceof Response){return $route_has_role;}
                $route = app()->make('Route');
                if($route instanceof Response){return $route;}
                $route_has_role->Load_From_Route_And_Role($route,$user_role->Company_Roles);
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
