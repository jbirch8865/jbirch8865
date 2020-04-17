<?php

namespace App\Providers;

use app\Helpers\Program_Session;
use app\Helpers\Company;
use app\Helpers\Route;
use app\Helpers\User;
use app\Helpers\Route_Role;
use app\Helpers\Program;
use \app\Facades\Users;
use app\Facades\Programs;
use Illuminate\Support\ServiceProvider;
use app\Rules\Unique_User;

class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->load_classphp(app_path('Helpers'));
        $this->load_classphp(app_path('Rules'));
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
            $this->Validate_Uri_Int_Parameter('company');
            try
            {
                $company->Load_Company_By_ID(app()->request->company);
                return $company;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_401(array('message' => 'The Company '.app()->request->company.' does not exist.'),app()->request)->send();
                exit();
            }
        });



        app()->singleton('Program',function(){
            $program = new Program;
            if(!app()->request->headers->has('client-id'))
            {
                Response_422(array('message' => 'The client-id header is required.'),app()->request)->send();
                exit();
            }
            if(strlen(app()->request->header('client-id')) > Programs::Get_Column('client_id')->Get_Data_Length())
            {
                Response_422(['message' => 'client-id is malformed.'],app()->request)->send();
                exit();
            }
            try
            {
                $program->Load_Program_By_Client_ID(app()->request->header('client-id'));
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_401(array('message' => 'The client-id is not valid.'),app()->request)->send();
                exit();
            }
            return $program;
        });

        app()->singleton('Program_Session_Username',function(){
            $this->User_Post_Required();
            $session = new Program_Session;
            try
            {
                $session->Create_New_Session(app()->request->header('client-id'),app()->make('Company'),app()->request->input('user'),app()->request->input('password'));
            } catch (\Authentication\Incorrect_Password $e)
            {
                Response_401(['message' => 'credentials incorrect.'],app()->request)->send();
                exit();
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                Response_401(['message' => 'credentials incorrect.'],app()->request)->send();
                exit();
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                Response_401(['message' => 'The user is currently inactive.'],app()->request)->send();
                exit();
            }
            return $session;

        });


        app()->singleton('Program_Session',function(){
            $session = new Program_Session;
            if(!app()->request->headers->has('User-Access-Token'))
            {
                Response_422(['message' => 'The User-Access-Token header is required.'],app()->request)->send();
            }
            try
            {
                $session->Load_Session_By_Access_Token(app()->request->header('User-Access-Token'));
                if($session->Is_Expired())
                {
                    Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                        'href' => route('User_Signin',['company' => app()->request->company]),
                        'type' => 'POST'
                    ]],app()->request)->send();
                    exit();
                }
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_422(['message' => 'The User-Access-Token is not valid.'],app()->request)->send();
                exit();
            }
            return $session;

        });

        app()->singleton('Route', function(){
            $route = new Route;
            try
            {
                $route->Load_From_Route_Name($route->Get_Current_Route_Name());
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_500(['message' => 'Sorry this route wasn\'t properly registered.  Please feel free to report this issue on the github issue tracker for this repo.'],app()->request)->send();
                exit();
            }
            return $route;
        });

        app()->singleton('Route_Has_Role', function(){
            $route_role = new Route_Role;
            return $route_role;
        });
        app()->singleton('Get_Active_User', function(){
            $this->User_Post_Required();
            try
            {
                return new User(app()->request->input('user'),app()->request->input('password'),app()->make('Company'));
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                Response_422(['message' => 'Sorry '.app()->request->input('user').'does not exist'],app()->request)->send();
                exit();
            } catch(\Authentication\Incorrect_Password $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'\'s password was incorrect'],app()->request)->send();
                exit();
            } catch(\Active_Record\Object_Is_Currently_Inactive $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'is currently inactive.  You need to include the query parameter active_status if you want to return inactive objects'],app()->request)->send();
                exit();
            }
        });

        app()->singleton('Get_User', function(){
            $this->User_Post_Required();
            try
            {
                return new User(app()->request->input('user'),app()->request->input('password'),app()->make('Company'),false,false);
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                Response_422(['message' => 'Sorry '.app()->request->input('user').'does not exist'],app()->request)->send();
                exit();
            } catch(\Authentication\Incorrect_Password $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'\'s password was incorrect'],app()->request)->send();
                exit();
            }
        });

        app()->singleton('Create_User', function(){
            $this->User_Post_Required();
            app()->request->validate([
                'user' => [new Unique_User]
            ]);
            $user = new User(app()->request->input('user'),app()->request->input('password'),app()->make('Company'),true);
            return $user;
        });

        app()->singleton('Update_User', function(){
            if(!isset(app()->request->user))
            {
                Response_400(['message' => 'username is required in the url.'],app()->request)->send();
                exit();
            }elseif(!is_string(app()->request->user))
            {
                Response_400(['message' => 'username must be a valid string.'],app()->request)->send();
                exit();
            }
            try
            {
                $user = new User(app()->request->user,'skip_check',app()->make('Company'),false,false);
            } catch (\Authentication\User_Does_Not_Exist $e)
            {
                Response_422(['message' => 'User does not exist'],app()->request)->send();
                exit();
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                Response_422(['message' => 'The user is currently inactive and must first be reactivated.'],app()->request)->send();
                exit();
            }
            return $user;
        });

    }

    function User_Post_Required()
    {
        app()->request->validate([
            'user' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
            'password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
    }

    function Validate_Uri_Int_Parameter($param)
    {
        if(!isset(app()->request->$param))
        {
            Response_400(['message' => $param.' is required in the url.'],app()->request)->send();
            exit();
        }elseif(!is_numeric(app()->request->company))
        {
            Response_400(['message' => $param.'parameter must be an integer.'],app()->request)->send();
            exit();
        }elseif(app()->request->company <= 0)
        {
            Response_400(['message' => $param.'parameter must be an integer greater than 0.'],app()->request)->send();
            exit();
        }

    }
}
