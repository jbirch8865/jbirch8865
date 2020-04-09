<?php
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
class Users extends \DatabaseLink\Table
{
    function __construct()
    {
        global $toolbelt_base;
        parent::__construct('Users',$toolbelt_base->dblink);
    }
}

class Programs extends \DatabaseLink\Table
{
    function __construct()
    {
        global $toolbelt_base;
        parent::__construct('Programs',$toolbelt_base->dblink);
    }
}

class Companies extends \DatabaseLink\Table
{
    function __construct()
    {
        global $toolbelt_base;
        parent::__construct('Companies',$toolbelt_base->dblink);
    }
}
