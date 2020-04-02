<?php
global $toolbelt_base;
$toolbelt_base->Rights = new \DatabaseLink\Table('Rights',$toolbelt_base->dblink);
$toolbelt_base->Routes = new \DatabaseLink\Table('Routes',$toolbelt_base->dblink);
$toolbelt_base->Routes_Have_Roles = new \DatabaseLink\Table('Routes_Have_Roles',$toolbelt_base->dblink);

