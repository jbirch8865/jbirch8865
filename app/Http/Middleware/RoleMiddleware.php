<?php

namespace App\Http\Middleware;
use app\Facades\Route;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle($request, Closure $next)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        if (!$toolbelt->objects->Get_Route()->Am_I_Implicitly_Allowed())
        {
            $user_roles = $toolbelt->objects->Get_Program_Session()->Get_Users_Have_Roles();
            $method = $toolbelt->objects->Get_Route()->Get_Current_Route_Method();
            ForEach($user_roles as $user_role)
            {
                $route_has_role = new \app\Helpers\Route_Role;
                if(!$user_role->Get_Company_Roles()->Is_Object_Active())
                {
                    continue;
                }
                $route_has_role->Load_From_Route_And_Role($toolbelt->objects->Get_Route(),$user_role->Get_Company_Roles());
                if($route_has_role->Get_Rights()->Is_Method_Allowed($method))
                {
                    return $next($request);
                }
            }
            $toolbelt->functions->Response_401(['message'=>'Sorry the user is not allowed to access this route with this method.'],$request)->send();
            exit();
        }else
        {
            $toolbelt = new \Test_Tools\toolbelt;
            if(!$request->headers->has('secret-token'))
            {
                return $toolbelt->functions->Response_422(['message' => 'The secret-token header is required.'],$request);
            }
            if(strlen($request->header('secret-token')) > $toolbelt->tables->Get_Programs()->Get_Column('secret')->Get_Data_Length())
            {
                return $toolbelt->functions->Response_422(['message' => 'secret-token is malformed.'],$request);
            }
            if($request->header('secret-token') == $toolbelt->objects->Get_Program()->Get_Secret())
            {
                if($toolbelt->cConfigs->Is_Prod() && $toolbelt->objects->Get_Program()->Get_Client_ID() == $toolbelt->cConfigs->Get_Client_ID())
                {
                    return $toolbelt->functions->Response_401(['message' => 'Sorry this client-id/secret-token is only allowed in the sandbox environment.'],$request);
                }
                return $next($request);
            }else
            {
                return $toolbelt->functions->Response_401(['message' => 'secret-token is incorrect.'],$request);
            }
        }
        return $next($request);
    }
}
