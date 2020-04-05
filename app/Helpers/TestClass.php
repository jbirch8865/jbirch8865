<?php


class Toolbelt extends \Test_Tools\toolbelt
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

namespace app\Facades;

use Illuminate\Support\Facades\Facade;

class Toolbelt extends Facade {
   protected static function getFacadeAccessor() { return 'Toolbelt'; }
}