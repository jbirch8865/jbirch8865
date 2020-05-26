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
        if($toolbelt->Use_Objects()->Get_Program_Session()->Can_Routed_User_Access_The_Current_Route())
        {
        }elseif($this->toolbelt->Use_Objects()->Get_Route()->Am_I_Implicitly_Allowed())
        {
            if(!$request->headers->has('secret-token'))
            {
                return $toolbelt->Use_Functions()->Response_422(['message' => 'The secret-token header is required.'],$request);
            }
            if(strlen($request->header('secret-token')) > $toolbelt->Use_Tables()->Get_Programs()->Get_Column('secret')->Get_Data_Length())
            {
                return $toolbelt->Use_Functions()->Response_422(['message' => 'secret-token is malformed.'],$request);
            }
            if($request->header('secret-token') == $toolbelt->Use_Objects()->Get_Program()->Get_Secret())
            {
                if($toolbelt->Use_cConfigs()->Is_Prod() && $toolbelt->Use_Objects()->Get_Program()->Get_Client_ID() == $toolbelt->Use_cConfigs()->Get_Client_ID())
                {
                    return $toolbelt->Use_Functions()->Response_401(['message' => 'Sorry this client-id/secret-token is only allowed in the sandbox environment.'],$request);
                }
            }else
            {
                return $toolbelt->Use_Functions()->Response_401(['message' => 'secret-token is incorrect.'],$request);
            }
        }else
        {
            return $toolbelt->Use_Functions()->Response_401(['message' => 'This user doesn\'t have rights to use this endpoint and method.']);
        }
        return $next($request);
    }
}
