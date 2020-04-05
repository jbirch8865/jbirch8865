<?php declare(strict_types=1);
namespace app\Helpers;

use Active_Record\Active_Record;
class Route_Role extends Active_Record
{
    public $_table = "Routes_Have_Roles";

    function __construct()
    {
        parent::__construct();
    }
    /**
     * @throws Active_Record_Object_Failed_To_Load — — if route id doesn't exist
     */
    public function Get_Route_Name() : ?string
    {
        $route = new Route;
        $route->Load_From_Route_ID($this->Get_Route_ID());
        return $route->Get_Value_From_Name('name');
    }
    public function Get_Route_ID() : ?int
    {
        return (int) $this->Get_Value_From_Name('route_id');
    }    
    /**
     * @throws Active_Record_Object_Failed_To_Load — — if name doesn't exist
     * @throws Update_Failed if other required parameters aren't set yet
     */
    public function Set_Route_By_Name(string $route_name,bool $update_immediately) : void
    {
        $route = new Route;
        $route->Load_From_Route_Name($route_name);
        $this->Set_Int('route_id',$route->Get_Verified_ID(),$update_immediately);
    }
    /**
     * @throws Update_Failed if other required parameters aren't set yet
     */
    public function Set_Route_By_ID(int $route_id,bool $update_immediately) : void
    {
        $this->Set_Int('route_id',$route_id,$update_immediately);
    }
    /**
     * @throws Active_Record_Object_Failed_To_Load — — if role id doesn't exist
     */
    public function Get_Role_Name() : ?string
    {
        $role = new \Company\Company_Role;
        $role->Load_Role_By_ID($this->Get_Role_ID());
        return $role->Get_Value_From_Name('name');
    }
    public function Get_Role_ID() : ?int
    {
        return (int) $this->Get_Value_From_Name('role_id');
    }    
    /**
     * @throws Active_Record_Object_Failed_To_Load — — if name doesn't exist
     * @throws Update_Failed if other required parameters aren't set yet
     */
    public function Set_Role_By_Name(string $role_name,bool $update_immediately) : void
    {
        $role = new \Company\Company_Role;
        $role->Load_Role_By_Name($role_name);
        $this->Set_Int('role_id',$role->Get_Verified_ID(),$update_immediately);
    }
    /**
     * @throws Update_Failed if other required parameters aren't set yet
     */
    public function Set_Role_By_ID(int $role_id,bool $update_immediately) : void
    {
        $this->Set_Int('id',$role_id,$update_immediately);
    }   
    
    public function Get_Right_ID() : ?int
    {
        return (int) $this->Get_Value_From_Name('right_id');
    }   
    /**
     * @throws Update_Failed if other required parameters aren't set yet
     */
    public function Set_Right_By_ID(int $right_id,bool $update_immediately) : void
    {
        $this->Set_Int('right_id',$right_id,$update_immediately);
    }   

}

?>