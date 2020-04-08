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
    public function Set_Name(string $route_name) : void
    {
        $this->Set_Varchar($this->table_dblink->Get_Column('name'),$route_name,false);
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

    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    public function Am_I_Implicitly_Allowed() : bool
    {
        return (bool) $this->Get_Value_From_Name('implicit_allow');
    }

}

?>