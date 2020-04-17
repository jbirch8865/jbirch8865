<?php

use app\Helpers\Route as HelpersRoute;
use Faker\UniqueGenerator;
use Illuminate\Routing\Route;
use Mpociot\ApiDoc\Extracting\Strategies\Strategy;

class AddOrganizationIdUrlParameter extends Strategy
{
   public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
   {
       $array = [];
       if($route->uri() != 'doc.json' && strpos($route->uri(),'{company}'))
       {

            $array ['company'] = [
                    'type' => 'integer',
                    'description' => '{integer} The ID of the organization',
                    'required' => true,
                    'value' => 1,
            ];
       }
       return $array;
   }
}

class Add_Secret_ID_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        $cur_route = new HelpersRoute;
        $cur_route->Load_From_Route_Name($route->getName());
        if($cur_route->Am_I_Implicitly_Allowed())
        {
            $toolbelt = new \Test_Tools\toolbelt;
            $array['secret-token'] = $toolbelt->cConfigs->Get_Secret_ID();
        }
        return $array;
    }
}

class Add_Client_ID_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        if ($route->uri() != 'doc.json') {
            $toolbelt = new \Test_Tools\toolbelt;
            $array['client-id'] = $toolbelt->cConfigs->Get_Client_ID();
        }
        return $array;
    }

}

class Add_Access_Token extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        $cur_route = new HelpersRoute;
        $cur_route->Load_From_Route_Name($route->getName());
        if(!$cur_route->Am_I_Implicitly_Allowed())
        {
            $name = $route->getName();
            $session = new \API\Program_Session;
            $company = new \app\Helpers\Company;
            $company->Load_Company_By_ID(1);
            $session->Create_New_Session($session->cConfigs->Get_Client_ID(),$company,'default',$session->cConfigs->Get_Client_ID());
            $array['User-Access-Token'] = $session->Get_Access_Token();
        }
        return $array;
    }
}
class Add_URI_Parameters extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        if($route->named('Delete_User'))
        {
            global $new_user_for_documentation;
            $array['user'] = [
                'type' => 'string',
                'description' => '{string} username to delete',
                'required' => true,
                'value' => $new_user_for_documentation,
            ];
        }
        if($route->named('Update_User'))
        {
            global $new_user_for_documentation;
            $array['user'] = [
                'type' => 'string',
                'description' => '{string} username to change password',
                'required' => true,
                'value' => $new_user_for_documentation
            ];
        }
        if($method->name == 'index' && !$route->named('List_Routes'))
        {
            $array['active_status'] = [
                    'type' => 'bool',
                    'description' => '{bool} Include inactive objects',
                    'required' => false,
                    'value' => false
            ];
            $array['include_details'] = [
                    'type' => 'int',
                    'description' => '{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.',
                    'required' => false,
                    'value' => '2'
            ];
            $array['details_offset'] = [
                    'type' => 'int',
                    'description' => '{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.',
                    'required' => false,
                    'value' => '0'
            ];
            $array['details_limit'] = [
                    'type' => 'int',
                    'description' => '{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.',
                    'required' => false,
                    'value' => '5'
            ];
            $array['limit'] = [
                    'type' => 'int',
                    'description' => '{int} How many objects do you want to return. Must be a number between 1 and 100.',
                    'required' => false,
                    'value' => '10'
            ];
            $array['offset'] = [
                    'type' => 'int',
                    'description' => '{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.',
                    'required' => false,
                    'value' => '0'
            ];
        }
        return $array;
    }
}
class Add_Query_Data extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        if($route->named('Delete_User'))
        {
            $array['active_status'] = [
                'type' => 'bool',
                'description' => '{bool} When true user will be marked inactive.  When false the user will be deleted.',
                'required' => true,
                'value' => true
            ];
        }
        return $array;
    }
}


class Add_Post_Data extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        if($route->named('User_Signin'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            $array['user'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => 'default'
            ];
            $array['password'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => $toolbelt->cConfigs->Get_Client_ID()
            ];

        }elseif($route->named('Create_User'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            global $new_user_for_documentation;
            $new_user_for_documentation = uniqid();
            $array['user'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => $new_user_for_documentation
            ];
            $array['password'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => $toolbelt->cConfigs->Get_Client_ID()
            ];
        }elseif($route->named('Update_User'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            $array['new_password'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => $toolbelt->cConfigs->Get_Client_ID()
            ];
        }elseif($route->named('Create_Company'))
        {
            try
            {
                $company = new \app\Helpers\Company;
                $company->Load_Company_By_Name('documentation_company');
                $company->Delete_Company(false);
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e){}
                $array['company_name'] = [
                    'type' => 'string',
                    'description' => '{string}',
                    'required' => true,
                    'value' => 'documentation_company'
               ];
        }
        if($method->name == 'update')
        {
            $array['active_status'] = [
                    'type' => 'bool',
                    'description' => '{string}',
                    'required' => false,
                    'value' => true
            ];
        }
        return $array;
    }

}
