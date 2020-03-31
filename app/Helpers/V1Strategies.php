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
                'company_id' => [
                    'type' => 'integer',
                    'description' => 'The ID of the organization', 
                    'required' => true, 
                    'value' => 2,
                ]
            ];
       }
   }
}

class Add_Secret_ID_Header extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if($route->named('User_Signin'))
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
            return array('Authorization-Token' => $toolbelt->cConfigs->Get_Client_ID());
        }
    }

}

class Add_Post_Data extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if($route->named('User_Signin'))
        {
            $toolbelt = new \Test_Tools\toolbelt;
            return [
            'user_name' => [
                'type' => 'string',
                'description' => '', 
                'required' => true, 
                'value' => $toolbelt->cConfigs->Get_Name_Of_Project()
                ],
            'plain_text_password' => [
                'type' => 'string',
                'description' => '', 
                'required' => true, 
                'value' => $toolbelt->cConfigs->Get_Connection_Password()
                ]
            ];
        }
    }

}