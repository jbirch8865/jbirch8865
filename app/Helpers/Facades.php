<?php
namespace app\Facades;

use Illuminate\Support\Facades\Facade;

class Program extends Facade {
   protected static function getFacadeAccessor() { return 'Program'; }
}

class Program_Session extends Facade
{
    protected static function getFacadeAccessor() { return 'Program_Session'; }
}

class User extends Facade
{
    protected static function getFacadeAccessor() { return 'User'; }
}

class Company extends Facade
{
    protected static function getFacadeAccessor(){ return 'Company'; }
}
//tables
class Users extends Facade
{
    protected static function getFacadeAccessor() { return 'Users'; }
}

class Programs extends Facade
{
    protected static function getFacadeAccessor() { return 'Programs'; }
}
