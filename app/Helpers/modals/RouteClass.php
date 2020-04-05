<?php declare(strict_types=1);
namespace app\Helpers;
use Active_Record\Active_Record;
class Route extends Active_Record
{
    public $_table = "Routes";

    function __construct()
    {
        parent::__construct();
    }
    public function Get_Name() : string
    {
        return $this->Get_Value_From_Name('name');
    }
    public function Set_Name(string $route_name) : void
    {
        $this->Set_Varchar('name',$route_name,false);
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
        $this->Set_Int('implicit_allow',(int) $implicit_allow,$update_immediately);
    }

}

?>