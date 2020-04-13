<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use app\Helpers\Program_Session;
use app\Helpers\Company;
use app\Helpers\Route;
use app\Helpers\User;
use app\Helpers\Route_Role;
use app\Helpers\Program;
use \app\Facades\Users;
use app\Facades\Programs;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->load_classphp(app_path('Helpers'));
    }

    private function load_classphp($directory) {
        if(is_dir($directory)) {
            $scan = scandir($directory);
            unset($scan[0], $scan[1]); //unset . and ..
            foreach($scan as $file) {
                if(is_dir($directory."/".$file)) {
                    $this->load_classphp($directory."/".$file);
                } else {
                    if(strpos($file, '.php') !== false) {
                        require_once($directory."/".$file);
                    }
                }
            }
        }
    }

    public function boot()
    {
        app()->singleton('Company',function(){
            $company = new Company;
            try
            {
                $company->Load_Company_By_ID(app()->request->company);
                return $company;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_401(array('message' => 'The Company '.app()->request->company.' does not exist.'),app()->request);
            }
        });



        app()->singleton('Program',function(){
            $program = new Program;
            if(!app()->request->headers->has('client-id'))
            {
                return Response_422(array('message' => 'The client-id header is required.'),app()->request);
            }
            if(strlen(app()->request->header('client-id')) > Programs::Get_Column('client_id')->Get_Data_Length())
            {
                return Response_422(['message' => 'client-id is malformed.'],app()->request);
            }
            try
            {
                $program->Load_Program_By_Client_ID(app()->request->header('client-id'));
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_401(array('message' => 'The client-id is not valid.'),app()->request);
            }
            return $program;
        });

        app()->singleton('Program_Session_Username',function(){
            app()->request->validate([
                'username' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
                'password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
            ]);
            $session = new Program_Session;
            try
            {
                $session->Create_New_Session(app()->request->header('client-id'),app()->make('Company'),app()->request->input('username'),app()->request->input('password'));
            } catch (\Authentication\Incorrect_Password $e)
            {
                return Response_401(['message' => 'credentials incorrect.'],app()->request);
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                return Response_401(['message' => 'credentials incorrect.'],app()->request);
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                return Response_401(['message' => 'The user is currently inactive.'],app()->request);
            }
            return $session;

        });


        app()->singleton('Program_Session',function(){
            $session = new Program_Session;
            if(!app()->request->headers->has('User-Access-Token'))
            {
                return Response_422(['message' => 'The User-Access-Token header is required.'],app()->request);
            }
            try
            {
                $session->Load_Session_By_Access_Token(app()->request->header('User-Access-Token'));
                if($session->Is_Expired())
                {
                    print_r(Route::Get_Current_Route_Name());
                    return Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                        'href' => route('User_Signin',['company_id' => app()->request->Route('company')]),
                        'type' => 'POST'
                    ]],app()->request);
                }
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                return Response_422(['message' => 'The User-Access-Token is not valid.'],app()->request);
            }
            return $session;

        });

        app()->singleton('Route', function(){
            $route = new Route;
            $route->Load_From_Route_Name($route->Get_Current_Route_Name());
            return $route;
        });

        app()->singleton('Route_Has_Role', function(){
            $route_role = new Route_Role;
            return $route_role;
        });
        app()->singleton('Get_Active_User', function(){
            return new User(app()->request->input('username'),app()->request->input('password'),app()->make('Company'));
        });

        app()->singleton('Get_User', function(){
            return new User(app()->request->input('username'),app()->request->input('password'),app()->make('Company'),false,false);
        });

        app()->singleton('Create_User', function(){
            app()->request->validate([
                'username' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
                'password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
            ]);
            try
            {
                $user = new User(app()->request->input('username'),app()->request->input('password'),app()->make('Company'),true);
            } catch (\Authentication\Incorrect_Password $e)
            {
                $user = Response_422(['message' => 'Sorry the user already exists'],app()->request);
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                $user = Response_422(['message' => 'This user already exists and is currently inactive'],app()->request);
            }
            return $user;
        });

        app()->singleton('Update_User', function(){
            app()->request->validate([
                'new_password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
            ]);
            try
            {
                $user = new User(app()->request->user,'skip_check',app()->make('Company'));
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                return Response_422(['message' => 'User does not exist'],app()->request);
            }
            return $user;
        });

    }
}
