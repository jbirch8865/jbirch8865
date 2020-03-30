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
       }else
       {
           return null;
       }
   }
}

class SigninResponse extends Strategy
{
    public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
    {
        $toolbelt = new \Test_Tools\toolbelt;
        $response = Http::withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
            'Authorization-Token' => $toolbelt->cConfigs->Get_Client_ID(),
            'Secret-Token' => $toolbelt->cConfigs->Get_Secret_ID()
        ])->post('/api/v1/1/signin', [
            'user_name' => $toolbelt->cConfigs->Get_Name_Of_Project(),
            'plain_text_password' => $toolbelt->cConfigs->Get_Connection_Password()
        ]);
        return $response;
    }
}