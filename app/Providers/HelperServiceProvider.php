<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        // Construct the iterator
        $it = new \RecursiveDirectoryIterator(app_path('Helpers'));

        // Loop through files
        foreach(new \RecursiveIteratorIterator($it) as $file) {
            if ($file->getExtension() == 'php') {
                require_once $file;
            }
        }
        \ADODB_Active_Record::TableKeyHasMany('Routes_Have_Roles','route_id','Routes','id','\app\Helpers\Route');
    }
    public function boot()
    {
        app()->singleton('Program',function(){
            return new \API\Program();
        });
        app()->singleton('Program_Session',function(){
            $session = new \API\Program_Session;
            return $session;
        });
        app()->singleton('Route',function(){
            $request = app(\Illuminate\Http\Request::class);
            $route = new \app\Helpers\Route;
            $route->Load_From_Route_Name($request->route()->getName());
            return $route;
        });
        app()->singleton('Company',function(){
            $request = app(\Illuminate\Http\Request::class);
            $company = new \Company\Company;
            $company->Load_Company_By_ID($request->route('company_id'));
        });
        app()->bind('Company_Config',function(){
            $company_config = new \Company\Company_Config;
            return $company_config;   
        });
        
        app()->bind('Company_Role',function(){
            $company_role = new \Company\Company_Role;
            return $company_role;   
        });

    }
}
