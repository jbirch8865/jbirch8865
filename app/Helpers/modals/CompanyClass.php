<?php
namespace app\Helpers;

class Company extends \Company\Company
{
    function __construct()
    {
        parent::__construct();
    }
   /**
    * @throws \Active_Record\Object_Has_Not_Been_Loaded
    */
    function Create_Company_Role(string $role_name): void
    {
        parent::Create_Company_Role($role_name);
        $new_role = $this->Company_Roles[count($this->Company_Roles) - 1];
        $toolbelt = new \toolbelt;
        $toolbelt->Routes->Query_Single_Table(['id'],false);
        while($row = $toolbelt->Routes->Get_Queried_Data())
        {
            $route = new \app\Helpers\Route;
            $route->Load_From_Route_ID($row['id']);
            if($route->Am_I_Implicitly_Allowed())
            {
                continue;
            }
            $right = new \app\Helpers\Right;
            $right->Allow_Get();
            $right->Allow_Delete();
            $right->Allow_Patch();
            $right->Allow_Post();
            $right->Allow_Put();
            $route_has_role = new \app\Helpers\Route_Role;
            $route_has_role->Set_Right($right,false);
            $route_has_role->Set_Role($new_role,false);
            $route_has_role->Set_Route($route,true);
        }
    }
}
?>