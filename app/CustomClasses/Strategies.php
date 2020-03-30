<?php
namespace App\CustomClasses;
use Illuminate\Routing\Route;
use Mpociot\ApiDoc\Extracting\Strategies\Strategy;

class AddOrganizationIdUrlParameter extends Strategy
{
   public function __invoke(Route $route, \ReflectionClass $controller, \ReflectionMethod $method, array $routeRules, array $context = [])
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