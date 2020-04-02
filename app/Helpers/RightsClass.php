<?php declare(strict_types=1);

use Active_Record\Active_Record;
class Rights extends Active_Record
{
    public $_table = "Rights";

    function __construct()
    {
        parent::__construct();
    }
    public function Allow_Get() : void
    {
        $this->Set_Int('get',1);
    }
    public function Deny_Get() : void
    {
        $this->Set_Int('get',0);
    }
    public function Allow_Delete() : void
    {
        $this->Set_Int('delete',1);
    }
    public function Deny_Delete() : void
    {
        $this->Set_Int('delete',0);
    }
    public function Allow_Post() : void
    {
        $this->Set_Int('post',1);
    }
    public function Deny_Post() : void
    {
        $this->Set_Int('post',0);
    }
    public function Allow_Patch() : void
    {
        $this->Set_Int('patch',1);
    }
    public function Deny_Patch() : void
    {
        $this->Set_Int('patch',0);
    }
    public function Allow_Put() : void
    {
        $this->Set_Int('put',1);
    }
    public function Deny_Put() : void
    {
        $this->Set_Int('put',0);
    }
    /**
     * @throws \Active_Record\Active_Record_Object_Failed_To_Load if adodb->load method fails
     * @throws Object_Is_Already_Loaded
     */
    public function Load_Right_By_ID(int $right_id) : void
    {
        $this->Load_From_Int('id',$right_id);
    }
}

?>