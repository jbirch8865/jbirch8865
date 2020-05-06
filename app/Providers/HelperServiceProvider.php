<?php

namespace App\Providers;

use app\Helpers\Program_Session;
use app\Helpers\Company;
use app\Helpers\Route;
use app\Helpers\User;
use app\Helpers\Program;
use App\Rules\Does_This_Exist_In_Context;
use Illuminate\Support\ServiceProvider;
use app\Rules\Unique_User;
use App\Rules\Validate_Unique_Value_In_Column;
use App\Rules\Validate_Unique_Value_In_Columns;
use App\Rules\Validate_Value_Exists_In_Column;

class HelperServiceProvider extends ServiceProvider
{

    private \Test_Tools\toolbelt $toolbelt;

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
        $this->toolbelt = new \Test_Tools\toolbelt;
        app()->bind('Company',function(){
            $company = new Company;
            $this->Validate_Uri_Int_Parameter('company',$this->toolbelt->Get_Companies()->Get_Column('id'));
            try
            {
                $company->Load_Object_By_ID(app()->request->company);
                return $company;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_401(array('message' => 'The Company '.app()->request->company.' does not exist.'),app()->request)->send();
                exit();
            }
        });

        app()->bind('Company_Access_Token',function(){
            $company = new Company;
            try
            {
                $company->Load_Object_By_ID($this->toolbelt->Get_Program_Session()->Get_Company_ID());
                return $company;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_401(array('message' => 'The Company could not be derived from this access token.'),app()->request)->send();
                exit();
            }
        });

        app()->bind('Create_Program',function(){
            app()->request->validate([
                'limit' => ['lte:100','gte:1'],
                'details_limit' => ['lte:25','gte:1'],
                'offset' => ['gte:0'],
                'details_offset' => ['gte:0'],
                'include_details' => ['gte:0','lte:5']
            ]);
            $this->Validate_Header_Field_Required('client-id',$this->toolbelt->Get_Programs()->Get_Column('client_id'));
            $program = new Program;
            try
            {
                $program->Load_Program_By_Client_ID(app()->request->header('client-id'));
                return $program;
           } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_401(array('message' => 'The client-id '.app()->request->header('client-id').' is not valid.'),app()->request)->send();
                exit();
            }
        });

        app()->bind('Program_Session_Username',function(){

            $this->Validate_Post_Field_Required('user',$this->toolbelt->Get_Users(false)->Get_Column('username'));
            $this->Validate_Post_Field_Required('password',$this->toolbelt->Get_Users(false)->Get_Column('verified_hashed_password'));
            $session = new Program_Session;
            try
            {
                $session->Create_New_Session(app()->request->header('client-id'),$this->toolbelt->Get_Company(false),app()->request->input('user'),app()->request->input('password'));
                return $session;
            } catch (\app\Helpers\Incorrect_Password $e)
            {
                Response_401(['message' => 'credentials incorrect.'],app()->request)->send();
                exit();
            } catch (\app\Helpers\User_Does_Not_Exist $e)
            {
                Response_401(['message' => 'credentials incorrect.'],app()->request)->send();
                exit();
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                Response_401(['message' => 'The user is currently inactive.'],app()->request)->send();
                exit();
            }

        });


        app()->bind('Program_Session_Access_Token',function(){
            $this->Validate_Header_Field_Required('User-Access-Token',$this->toolbelt->Get_Programs_Have_Sessions()->Get_Column('access_token'));
            $session = new Program_Session;
            try
            {
                $session->Load_Session_By_Access_Token(app()->request->header('User-Access-Token'));
                if($session->Is_Expired())
                {
                    Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                        'href' => route('User_Signin',['company' => $session->Get_Company_ID()]),
                        'type' => 'POST'
                    ]],app()->request)->send();
                    exit();
                }
                return $session;
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_422(['message' => 'The User-Access-Token is not valid.'],app()->request)->send();
                exit();
            }
        });

        app()->bind('Route', function(){
            $route = new Route;
            try
            {
                $route->Load_From_Route_Name($route->Get_Current_Route_Name());
            } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
            {
                Response_500(['message' => 'Sorry this route wasn\'t properly registered.  Please feel free to report this issue by emailing jbirch88655@gmail.com'],app()->request)->send();
                exit();
            }
            return $route;
        });

        app()->bind('Get_Active_User', function(){

            $this->Validate_Post_Field_Required('user',$this->toolbelt->Get_Users()->Get_Column('username'));
            $this->Validate_Post_Field_Required('password',$this->toolbelt->Get_Users()->Get_Column('verified_hashed_password'));
            try
            {
                return new User(app()->request->input('user'),app()->request->input('password'),$this->toolbelt->Get_Company());
            } catch (\app\Helpers\User_Does_Not_Exist $e)
            {
                Response_422(['message' => 'Sorry '.app()->request->input('user').'does not exist'],app()->request)->send();
                exit();
            } catch(\app\Helpers\Incorrect_Password $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'\'s password was incorrect'],app()->request)->send();
                exit();
            } catch(\Active_Record\Object_Is_Currently_Inactive $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'is currently inactive.  You need to include the query parameter active_status if you want to return inactive objects'],app()->request)->send();
                exit();
            }
        });

        app()->bind('Get_Any_User', function(){
            $this->Validate_Post_Field_Required('user',$this->toolbelt->Get_Users()->Get_Column('username'));
            $this->Validate_Post_Field_Required('password',$this->toolbelt->Get_Users()->Get_Column('verified_hashed_password'));
            try
            {
                return new User(app()->request->input('user'),app()->request->input('password'),$this->toolbelt->Get_Company(),false,false);
            } catch (\app\Helpers\User_Does_Not_Exist $e)
            {
                Response_422(['message' => 'Sorry '.app()->request->input('user').'does not exist'],app()->request)->send();
                exit();
            } catch(\app\Helpers\Incorrect_Password $e)
            {
                Response_401(['message' => 'Sorry '.app()->request->input('user').'\'s password was incorrect'],app()->request)->send();
                exit();
            }
        });

        app()->bind('Create_User', function(){
            $this->Validate_Post_Field_Required('user',$this->toolbelt->Get_Users()->Get_Column('username'));
            $this->Validate_Post_Field_Required('password',$this->toolbelt->Get_Users()->Get_Column('verified_hashed_password'));
            $columns = [];
            $this->toolbelt->Get_Users()->Get_Column('company_id')->Set_Field_Value($this->toolbelt->Get_Company()->Get_Verified_ID());
            $this->toolbelt->Get_Users()->Get_Column('project_name')->Set_Field_Value($this->toolbelt->cConfigs->Get_Name_Of_Project());
            $columns[] = $this->toolbelt->Get_Users()->Get_Column('company_id');
            $columns[] = $this->toolbelt->Get_Users()->Get_Column('project_name');
            app()->request->validate([
                'user' => [new Validate_Unique_Value_In_Columns($columns,$this->toolbelt->Get_Users()->Get_Column('username'))],
                ]);
            $user = new User(app()->request->input('user'),app()->request->input('password'),$this->toolbelt->Get_Company(),true);
            return $user;
        });

        app()->bind('Update_User', function(){
            $this->Validate_Uri_String_Parameter('user',$this->toolbelt->Get_Users()->Get_Column('username'));
            try
            {
                $user = new User(app()->request->user,'skip_check',$this->toolbelt->Get_Company(),false,false);
            } catch (\app\Helpers\User_Does_Not_Exist $e)
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
    function Validate_Post_Field_Required($field_name,\DatabaseLink\Column $column) : void
    {
        app()->request->validate([
            $field_name => ['required','max:'.$column->Get_Data_Length()],
        ]);
    }
    function Validate_Post_Field($field_name,\DatabaseLink\Column $column) : void
    {
        app()->request->validate([
            $field_name => ['max:'.$column->Get_Data_Length()],
        ]);
    }

    function Validate_Post_Int_Field_Required($field_name,\DatabaseLink\Column $column,bool $include_inactive = false) : void
    {
        app()->request->validate([
            $field_name => ['required','gt:0'],
        ]);
        $column->Set_Field_Value(app()->request->input($field_name));
        app()->request->validate([
            $field_name => [new Does_This_Exist_In_Context($column,$include_inactive)]
        ]);
    }
    function Validate_Post_Int_Field($field_name,\DatabaseLink\Column $column) : void
    {
        if(app()->request->input($field_name,false))
        {
            $column->Set_Field_Value(app()->request->input($field_name));
            app()->request->validate([
                $field_name => [new Does_This_Exist_In_Context($column)]
            ]);
        }
    }

    function Validate_Header_Field_Required(string $field_name,\DatabaseLink\Column $column) : void
    {
        $header_name = $field_name;
        if(!app()->request->headers->has($header_name))
        {
            Response_422(array('message' => 'The '.$header_name.' header is required.'),app()->request)->send();
            exit();
        }
        if(strlen(app()->request->header($header_name)) > $column->Get_Data_Length())
        {
            Response_422(['message' => $header_name.' is malformed.'],app()->request)->send();
            exit();
        }
    }
    function Validate_Uri_Int_Parameter($param,\DatabaseLink\Column $column) :void
    {
        if(!isset(app()->request->$param))
        {
            Response_400(['message' => $param.' is required in the url.'],app()->request)->send();
            exit();
        }elseif(!is_numeric(app()->request->$param))
        {
            Response_400(['message' => $param.' parameter must be an integer.'],app()->request)->send();
            exit();
        }elseif(app()->request->$param <= 0)
        {
            Response_400(['message' => $param.' parameter is malformed.'],app()->request)->send();
            exit();
        }
        $column->Set_Field_Value(app()->request->$param);
        app()->request->validate([$param => [new Does_This_Exist_In_Context($column)]]);
    }
    function Validate_Uri_String_Parameter($param,\DatabaseLink\Column $column) :void
    {
        if(!isset(app()->request->$param))
        {
            Response_400(['message' => $param.' is required in the url.'],app()->request)->send();
            exit();
        }elseif(!is_string(app()->request->$param))
        {
            Response_400(['message' => $param.' parameter must be an string.'],app()->request)->send();
            exit();
        }elseif($column->Get_Data_Length() < strlen(app()->request->$param))
        {
            Response_400(['message' => $param.' parameter is malformed.'],app()->request)->send();
            exit();
        }
        $column->Set_Field_Value(app()->request->$param);
        app()->request->validate([$param => [new Does_This_Exist_In_Context($column)]]);
    }

}
