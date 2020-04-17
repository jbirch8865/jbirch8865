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
            $user_roles = $session->Users_Have_Roles;
            $method = $request->method();
            ForEach($user_roles as $user_role)
            {
                $route_has_role = app()->make('Route_Has_Role');
                $route = app()->make('Route');
                $route_has_role->Load_From_Route_And_Role($route,$user_role->Company_Roles);
                if($route_has_role->Rights->Is_Method_Allowed($method))
                {
                    return $next($request);
                }
            }
            Response_401(['message'=>'Sorry the user is not allowed to access this route with this method.'],$request)->send();
            exit();
        }
        return $next($request);
    }
}
