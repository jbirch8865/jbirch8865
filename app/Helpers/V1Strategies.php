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
            $company->Load_Object_By_ID(1);
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
        global $documentation_role_id_to_delete;
        if($route->named('Delete_User'))
        {
            $array['user'] = [
                'type' => 'string',
                'description' => '{string} username to delete',
                'required' => true,
                'value' => 'new_user'
            ];
        }elseif($route->named('Update_User'))
        {
            $array['user'] = [
                'type' => 'string',
                'description' => '{string} username to change password',
                'required' => true,
                'value' => 'new_user'
            ];
        }elseif($route->named('Enable_Default_User'))
        {
            $array['user'] = [
                'type' => 'string',
                'description' => '{string} default username.  Not required. In fact will be overridden',
                'required' => false,
                'value' => 'default'
            ];
        }elseif($route->named('Delete_Role') || $route->named('Edit_Role'))
        {
            $array['role'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => $documentation_role_id_to_delete
            ];
        }elseif($route->named('User_Signout'))
        {
            $array['signin'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => 'default'
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
        if($method->name == 'index')
        {
            $array['active_status'] = [
                'type' => 'bool',
                'description' => '{bool} When true will only return active objects.  When false all objects returned.',
                'required' => true,
                'value' => true
            ];
        }elseif($method->name == 'destroy')
        {
            $array['active_status'] = [
                'type' => 'bool',
                'description' => '{bool} When true object will be marked inactive.  When false the object will be deleted.',
                'required' => true,
                'value' => false
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
            $array['user'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => 'new_user'
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
        }elseif($route->named('Create_Role') || $route->named('Edit_Role'))
        {
            $array['role_name'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => uniqid()
           ];
           $array['Routes_Have_Roles'] = [
            'type' => 'array',
            'description' => '{array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.',
            'required' => true,
            'value' => [
                [
                    'route_id' => '3',
                    'Rights' => [
                        'get' => true,
                        'post' => false,
                        'patch' => false,
                        'put' => false,
                        'destroy' => false
                    ]
                ],
                [
                    'route_id' => '6',
                    'Rights' => [
                        'get' => false,
                        'post' => true,
                        'patch' => false,
                        'put' => false,
                        'destroy' => false
                    ]
                ]
            ]
           ];
        }
        if($method->name == 'update' && !$route->named('Enable_Default_User'))
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
