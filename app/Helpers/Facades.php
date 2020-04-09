<?php
namespace app\Facades;

use Illuminate\Support\Facades\Facade;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;

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

class Route extends Facade
{
    protected static function getFacadeAccessor(){ return 'Route'; }
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

class Companies extends Facade
{
    protected static function getFacadeAccessor() { return 'Companies'; }
}

class Routes extends Facade
{
    protected static function getFacadeAccessor() { return 'Routes'; }
}
