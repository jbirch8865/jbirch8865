<?php
namespace app\Helpers;
    /**
     *
     */

class Company_Role extends \Company\Company_Role implements iActiveRecord
{
    function __construct()
    {
        $toolbelt = new \toolbelt;
        parent::__construct();
        $toolbelt->active_record_relationship_manager->Load_Table_Has_Many_If_Empty($this->table_dblink,$toolbelt->Routes_Have_Roles,$toolbelt->Routes_Have_Roles->Get_Column('role_id'),'\app\Helpers\Route_Role');

    }
    /**
     * @throws \Active_Record\Object_Has_Not_Been_Loaded
     */
    function Get_API_Response_Collection(): array
    {
        return $this->Get_Response_Collection(app()->request->input('include_details',0),app()->request->input('details_offset',0),app()->request->input('details_limit',1));
    }
}

?>
