<?php


class toolbelt extends \Test_Tools\toolbelt
{
    public \DatabaseLink\Table $Rights;
    public \DatabaseLink\Table $Routes;

    function __construct()
    {
        parent::__construct();
        global $toolbelt_base;
        $this->Rights = $toolbelt_base->Rights;
        $this->Routes = $toolbelt_base->Routes;

    }
}