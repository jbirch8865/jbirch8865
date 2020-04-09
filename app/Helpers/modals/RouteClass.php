<?php declare(strict_types=1);
namespace app\Helpers;
use Active_Record\Active_Record;
class Route extends Active_Record
{
    public $_table = "Routes";

    function __construct()
    {
        $toolbelt = new \toolbelt;
        parent::__construct();
        $toolbelt->active_record_relationship_manager->Load_Table_Has_Many_If_Empty($this->table_dblink,$toolbelt->Routes_Have_Roles,$toolbelt->Routes_Have_Roles->Get_Column('route_id'),'\app\Helpers\Route_Role');
    }
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    public function Get_Name() : string
    {
        return $this->Get_Value_From_Name('name');
    }
    public function Set_Name(string $route_name,bool $update_immediately = true) : void
    {
        $this->Set_Varchar($this->table_dblink->Get_Column('name'),$route_name,false,$update_immediately);
    }
    /**
     * @throws Object_Is_Already_Loaded
     * @throws Active_Record_Object_Failed_To_Load — if id doesn't exist
     */
    public function Load_From_Route_ID(int $route_id) : void
    {
        $this->Load_From_Int('id',$route_id);
    }
    /**
     * @throws Object_Is_Already_Loaded
     * @throws Active_Record_Object_Failed_To_Load — if name doesn't exist
     */
    public function Load_From_Route_Name(string $route_name) : void
    {
        $this->Load_From_Varchar('name',$route_name);
    }
    /**
     * @throws Update_Failed if not all required values set and update_immediately is true
     */
    public function Set_Implicit_Allow(bool $implicit_allow = false,bool $update_immediately = false) : void
    {
        $this->Set_Int($this->table_dblink->Get_Column('implicit_allow'),(int) $implicit_allow,$update_immediately);
    }
    protected function Create_Object() : void
    {
        parent::Create_Object();
        $this->Add_To_All_Companies_Master_Role();
    }
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    public function Am_I_Implicitly_Allowed() : bool
    {
        return (bool) $this->Get_Value_From_Name('implicit_allow');
    }

    private function Add_To_All_Companies_Master_Role() : void
    {
        $toolbelt = new \toolbelt;
        $toolbelt->Companies->Query_Single_Table(['id'],false);
        while($row = $toolbelt->Companies->Get_Queried_Data())
        {
            $right = new \app\Helpers\Right;
            $right->Allow_Delete();
            $right->Allow_Get();
            $right->Allow_Patch();
            $right->Allow_Post();
            $right->Allow_Put();
            $company = new \app\Helpers\Company;
            $company->Load_Company_By_ID((int) $row['id']);
            $role = $company->Get_Master_Role();
            $route_role = new \app\Helpers\Route_Role;
            $route_role->Set_Right($right,false);
            $route_role->Set_Role($role,false);
            $route_role->Set_Route($this,true);
        }
    }
}

?>