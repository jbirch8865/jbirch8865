<?php declare(strict_types=1);

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
}

?>