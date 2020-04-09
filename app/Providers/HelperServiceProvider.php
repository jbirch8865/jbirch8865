<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Facades\Program_Session;
use app\Facades\Programs;
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

    }
    public function boot()
    {
        app()->singleton('Company',function($app){
            $company = new \Company\Company;
            try 
            {
                $company->Load_Company_By_ID($app->request->route('company_id'));
                return $company;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_401(array('message' => 'The Company '.$app->request->route('company_id').' does not exist.'),$app->request);
            }
        });



        app()->singleton('Program',function($app){
            $program = new \API\Program();
            if(!$app->request->headers->has('client-id'))
            {
                return Response_422(array('message' => 'The client-id header is required.'),$app->request);
            }
            if(strlen($app->request->header('client-id')) > Programs::Get_Column('client_id')->Get_Data_Length())
            {
                return Response_422(['message' => 'client-id is malformed.'],$app->request);
            }        
            try
            {
                $program->Load_Program_By_Client_ID($app->request->header('client-id'));
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_401(array('message' => 'The client-id is not valid.'),$app->request);
            }
            return $program;
        });



        app()->singleton('Program_Session',function($app){
            $session = new \API\Program_Session;
            if(!$app->request->headers->has('User-Access-Token'))
            {
                return Response_422(['message' => 'The User-Access-Token header is required.'],$app->request);
            }
            try
            {
                $session->Load_Session_By_Access_Token($app->request->header('User-Access-Token'));
                if($session->Is_Expired())
                {
                    return Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                        'href' => route('User_Signin',['company_id' => $app->request->route('company_id')]),
                        'type' => 'POST'
                    ]],$app->request);
                }
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_422(['message' => 'The User-Access-Token is not valid.'],$app->request);
            }
            return $session;
            
        });



        app()->singleton('Route', function(){
            $route = new \app\Helpers\Route;
            $route->Load_From_Route_Name(Route::currentRouteName());
            return $route;
        });

    }
}
