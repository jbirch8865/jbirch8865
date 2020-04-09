<?php
use Illuminate\Routing\Route;
use Mpociot\ApiDoc\Extracting\Strategies\Strategy;

class AddOrganizationIdUrlParameter extends Strategy
{
   public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
   {
       if($route->uri() != 'doc.json')
       {
           
            return [
                'company' => [
                    'type' => 'integer',
                    'description' => 'The ID of the organization', 
                    'required' => true, 
                    'value' => 1,
                ]
            ];
       }
   }
}

class Add_Secret_ID_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if($route->named('User_Signin') || $route->named('Create_Company') || $route->named('List_Companies'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            return array('Secret-Token' => $toolbelt->cConfigs->Get_Secret_ID());    
        }
    }
}

class Add_Client_ID_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if ($route->uri() != 'doc.json') {
            $toolbelt = new \Test_Tools\toolbelt;
            return array('client-id' => $toolbelt->cConfigs->Get_Client_ID());
        }
    }

}

class Add_Access_Token extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if(!$route->named('Signin') && !$route->named('List_Companies') && !$route->named('Create_Company'))
        {
            $session = new \API\Program_Session;
            $company = new \app\Helpers\Company;
            $company->Load_Company_By_ID(1);
            $session->Create_New_Session($session->cConfigs->Get_Client_ID(),$company,'default',$session->cConfigs->Get_Client_ID());
            return array('User-Access-Token' => $session->Get_Access_Token());
        }
    }
}

class Add_Post_Data extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if($route->named('User_Signin') || $route->named('Create_User'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            return [
            'username' => [
                'type' => 'string',
                'description' => '', 
                'required' => true, 
                'value' => 'default'
                ],
            'password' => [
                'type' => 'string',
                'description' => '', 
                'required' => true, 
                'value' => $toolbelt->cConfigs->Get_Client_ID()
                ]
            ];
        }
        if($route->named('Create_Company'))
        {
            try
            {
                $company = new \app\Helpers\Company;
                $company->Load_Company_By_Name('documentation_company');
                $company->Delete_Company(false);    
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e){}
            return [
                'company_name' => [
                    'type' => 'string',
                    'description' => '', 
                    'required' => true, 
                    'value' => 'documentation_company'
                    ]
                ];
    
        }
    }

}