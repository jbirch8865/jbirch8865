<?php

use Illuminate\Http\Request;

global $toolbelt_base;
$toolbelt_base->Rights = new \DatabaseLink\Table('Rights',$toolbelt_base->dblink);
$toolbelt_base->Routes = new \DatabaseLink\Table('Routes',$toolbelt_base->dblink);
$toolbelt_base->Routes_Have_Roles = new \DatabaseLink\Table('Routes_Have_Roles',$toolbelt_base->dblink);

class toolbelt extends \Test_Tools\toolbelt
{
    public \DatabaseLink\Table $Rights;
    public \DatabaseLink\Table $Routes;
    public \DatabaseLink\Table $Routes_Have_Roles;

    function __construct()
    {
        global $toolbelt_base;
        parent::__construct();
        $this->Rights = $toolbelt_base->Rights;
        $this->Routes = $toolbelt_base->Routes;
        $this->Routes_Have_Roles = $toolbelt_base->Routes_Have_Roles;
    }

}

class Table extends \DatabaseLink\Table
{
    function __construct(string $table_name)
    {
        global $toolbelt_base;
        parent::__construct($table_name,$toolbelt_base->dblink);
    }

    /**
     * @param string $object_class Company must be a valid app\Helpers\ class
     */
    public function Get_All_Objects(string $object_class,Request $request) : \Illuminate\Http\JsonResponse
    {
        if($request->input('include_disabled',false))
        {
            $this->Query_Single_Table(array('id'),false,"LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
        }else
        {
            $this->Query_Single_Table(array('id'),false,"WHERE `Active_Status` = '1' LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
        }
        $objects = array();
        While($row = $this->Get_Queried_Data())
        {
            $class = '\\app\\Helpers\\'.$object_class;
            $object = new $class;
            $object->Load_Object_By_ID($row['id']);
            if($request->input('include_details',false))
            {
                $objects[$object->Get_Friendly_Name()] = $object->Get_API_Response_Collection();
            }else
            {
                $objects[$object->Get_Friendly_Name()] = $object->Get_Verified_ID();
            }
        }
        return Response_200([
            'message' => 'Response Objects',
            $object_class => $objects
        ],$request);

    }
}


class Users extends \Table
{
    function __construct()
    {

        parent::__construct('Users');
    }
}

class Programs extends \Table
{
    function __construct()
    {

        parent::__construct('Programs');
    }
}

class Companies extends \Table
{
    function __construct()
    {

        parent::__construct('Companies');
    }
}

class Routes extends \Table
{
    function __construct()
    {

        parent::__construct('Routes');
    }
}

class Company_Roles extends \Table
{
    function __construct()
    {
        parent::__construct('Company_Roles');
    }
}
