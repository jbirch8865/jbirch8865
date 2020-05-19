<?php

use app\Helpers\Company;
use \app\Helpers\Route as HelpersRoute;
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

class Add_Content_Type_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $array = [];
        if (strtolower($method->name) == 'put' || strtolower($method->name) == 'patch' || strtolower($method->name) == 'post') {
            $array['Content-Type'] = 'application/json';
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
            $toolbelt = new \Test_Tools\toolbelt;
            $session = $toolbelt->Create_Sessions_Token_For_Documentation();
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
        global $documentation_employee_id_to_delete;
        global $documentation_customer_id_to_delete;
        global $documentation_credit_status_id_to_delete;
        global $documentation_equipment_id_to_delete;
        global $documentation_customer_address_id_to_delete;
        global $documentation_company_id_to_delete;
        global $documentation_customer_phone_number_id_to_delete;
        global $documentation_tag_tag_id_to_delete;
        global $documentation_customer_tag_id_to_delete;
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
            $array['company_role'] = [
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
        }elseif($route->named('Update_People') || $route->named('Delete_People'))
        {
            $array['people'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_employee_id_to_delete
            ];
        }elseif($route->named('Delete_Company'))
        {
            $array['company'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_company_id_to_delete
            ];
        }elseif($route->named('Update_Customer') || $route->named('Delete_Customer') || $route->named('List_Customer_Addresses') || $route->named('Create_Customer_Address') || $route->named('Create_Customer_Phone_Number') || $route->named('List_Customer_Phone_Numbers') || $route->named('Add_Tag_To_Customer') || $route->named('Remove_Tag_From_Customer') || $route->named('List_Tags_On_Customer'))
        {
            $array['customer'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_customer_id_to_delete
            ];
        }elseif($route->named('Update_Tag') || $route->named('Delete_Tag') || $route->named('Add_Role_To_Tag') || $route->named('List_Roles_On_Tag') || $route->named('Remove_Role_From_Tag'))
        {
            $array['tag'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_tag_tag_id_to_delete
            ];
        }elseif($route->named('Update_Credit_Status') || $route->named('Delete_Credit_Status'))
        {
            $array['creditstatus'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_credit_status_id_to_delete
            ];
        }elseif($route->named('Update_Equipment') || $route->named('Delete_Equipment'))
        {
            $array['equipment'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_equipment_id_to_delete
            ];
        }elseif($route->named('Update_Address') || $route->named('Delete_Address'))
        {
            $array['address'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_customer_address_id_to_delete
            ];
        }elseif($route->named('Update_Phone_Number') || $route->named('Delete_Phone_Number'))
        {
            $array['phonenumber'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_customer_phone_number_id_to_delete
            ];
        }elseif($route->named('Add_Tag_To_Tag') || $route->named('List_Tags_On_Tag') || $route->named('Remove_Tag_From_Tag'))
        {
            $array['tag'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_customer_tag_id_to_delete
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
        if($method->name == 'destroy')
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
            $array['include_disabled_objects'] = [
                'type' => 'bool',
                'description' => '{bool}',
                'required' => true,
                'value' => true
            ];
            $array['include_disabled_objects'] = [
                    'type' => 'bool',
                    'description' => '{bool}',
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
        $company = new Company;
        $company->Load_Object_By_ID(1);
        $array = [];
        global $documentation_credit_status_id_to_delete;
        global $documentation_tag_tag_id_to_delete;
        global $documentation_customer_tag_id_to_delete;
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
            $array['company_roles'] = [
                'type' => 'array',
                'description' => '{array}',
                'required' => true,
                'value' => [$toolbelt->objects->Get_Company()->Get_Master_Role()->Get_API_Response_Collection()]
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
            $array['company_roles'] = [
                'type' => 'array',
                'description' => '{array}',
                'required' => true,
                'value' => [$toolbelt->objects->Get_Company()->Get_Master_Role()->Get_API_Response_Collection()]
            ];
        }elseif($route->named('Create_Company'))
        {
            try
            {
                $company = new \app\Helpers\Company;
                $company->Load_Company_By_Name('documentation_company',true);
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
        }elseif($route->named('Create_Customer_Tag') || $route->named('Update_Tag'))
        {
            $array['tag_name'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => true,
                'value' => uniqid()
           ];
        }elseif($route->named('Create_Employee'))
        {
           $array['first_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Bob"
           ];
           $array['last_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Grillman"
           ];
           $array['title'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "The Builder"
           ];
           $array['description'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Amazing Biceps"
           ];
           $array['email'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Bob@amazingbiceps.com"
           ];

        }elseif($route->named('Update_People'))
        {
           $array['first_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Bobby"
           ];
           $array['last_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Grillman"
           ];
           $array['title'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "The Founder"
           ];
           $array['description'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Amazing Biceps"
           ];
           $array['email'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Bob@amazingbiceps.com"
           ];
        }elseif($route->named('Create_Customer'))
        {
           $array['customer_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Bob The Builder"
           ];
           $array['credit_status'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => $documentation_credit_status_id_to_delete
           ];
           $array['ccb'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => ""
           ];
           $array['website'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "www.amazingbiceps.com"
           ];

        }elseif($route->named('Update_Customer'))
        {
            $array['customer_name'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "Bob and Son The Builders"
            ];
            $array['credit_status'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => false,
                'value' => $documentation_credit_status_id_to_delete
            ];
            $array['ccb'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => ""
            ];
            $array['website'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "www.amazingbiceps.com"
            ];
        }elseif($route->named('Create_Credit_Status'))
        {
           $array['name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Good"
           ];
        }elseif($route->named('Update_Credit_Status'))
        {
            $array['name'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "Good 80"
            ];
        }elseif($route->named('Create_Equipment'))
        {
           $array['equipment_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "F3452"
           ];
        }elseif($route->named('Update_Equipment'))
        {
            $array['equipment_name'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "F3453"
            ];
        }elseif($route->named('Create_Customer_Address'))
        {
           $array['description'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Physical"
           ];
           $array['city'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Portland"
           ];
           $array['state'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "OR"
           ];
           $array['street1'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "1234 NW Front St"
           ];
           $array['street2'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "Suite 203"
           ];
           $array['zip'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => false,
            'value' => "97123"
           ];
           $array['lat'] = [
            'type' => 'string',
            'description' => '{string} Latitude Coordinate',
            'required' => false,
            'value' => "123.000001254"
           ];
           $array['lng'] = [
            'type' => 'string',
            'description' => '{string} Longitude Coordinate',
            'required' => false,
            'value' => "-312.45675"
           ];
           $array['url'] = [
            'type' => 'string',
            'description' => '{string} a url you would like to link to this address.',
            'required' => false,
            'value' => ""
           ];
           $array['google_id'] = [
            'type' => 'string',
            'description' => '{string} if present supply the google location id for extra google features',
            'required' => false,
            'value' => ""
           ];
        }elseif($route->named('Create_Customer_Tag'))
        {
           $array['tag_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Concrete"
           ];
        }elseif($route->named('Create_Tag_Tag'))
        {
           $array['tag_name'] = [
            'type' => 'string',
            'description' => '{string}',
            'required' => true,
            'value' => "Staff"
           ];
        }elseif($route->named('Add_Role_To_Tag') || $route->named('Remove_Role_From_Tag'))
        {
           $array['role'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => $company->Get_Master_Role()->Get_Verified_ID()
           ];
           $array['get'] = [
            'type' => 'bool',
            'description' => '{bool}',
            'required' => false,
            'value' => false
           ];
           $array['post'] = [
            'type' => 'bool',
            'description' => '{bool}',
            'required' => false,
            'value' => true
           ];
           $array['destroy'] = [
            'type' => 'bool',
            'description' => '{bool}',
            'required' => false,
            'value' => true
           ];
        }elseif($route->named('Create_Customer_Phone_Number'))
        {
            $array['description'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => 'Home 1'
            ];
            $array['area_code'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => '503'
           ];
           $array['prefix'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => '631'
           ];
           $array['suffix'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => true,
            'value' => '8865'
           ];
           $array['ext'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '1234'
           ];
           $array['country_code'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => 1
           ];
        }elseif($route->named('Update_Address'))
        {
            $array['description'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "Physical"
               ];
               $array['city'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "Sand Iago"
               ];
               $array['state'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "OR"
               ];
               $array['street1'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "1234 NW Front St"
               ];
               $array['street2'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "Suite 203"
               ];
               $array['zip'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => "97123"
               ];
               $array['lat'] = [
                'type' => 'string',
                'description' => '{string} Latitude Coordinate',
                'required' => false,
                'value' => "123.000001254"
               ];
               $array['lng'] = [
                'type' => 'string',
                'description' => '{string} Longitude Coordinate',
                'required' => false,
                'value' => "-312.45675"
               ];
               $array['url'] = [
                'type' => 'string',
                'description' => '{string} a url you would like to link to this address.',
                'required' => false,
                'value' => ""
               ];
               $array['google_id'] = [
                'type' => 'string',
                'description' => '{string} if present supply the google location id for extra google features',
                'required' => false,
                'value' => ""
               ];
        }elseif($route->named('Update_Phone_Number'))
        {
            $array['description'] = [
                'type' => 'string',
                'description' => '{string}',
                'required' => false,
                'value' => 'cell'
               ];
            $array['area_code'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '503'
           ];
           $array['prefix'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '828'
           ];
           $array['suffix'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '7180'
           ];
           $array['ext'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '1234'
           ];
           $array['country_code'] = [
            'type' => 'int',
            'description' => '{int}',
            'required' => false,
            'value' => '1'
           ];
        }elseif($route->named('Add_Tag_To_Tag')|| $route->named('Remove_Tag_From_Tag'))
        {
            $array['addtag'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_tag_tag_id_to_delete
            ];

        }elseif($route->named('Add_Tag_To_Customer') || $route->named('Remove_Tag_From_Customer'))
        {
            $array['addtag'] = [
                'type' => 'int',
                'description' => '{int}',
                'required' => true,
                'value' => $documentation_customer_tag_id_to_delete
            ];

        }
        return $array;
    }

}
