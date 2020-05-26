<?php

namespace App\Providers;

use app\Helpers\Program_Session;
use app\Helpers\Company;
use app\Helpers\Company_Role;
use app\Helpers\Route;
use app\Helpers\User;
use app\Helpers\Program;
use App\Rules\Does_This_Exist_In_Context;
use App\Rules\Validate_Json_Request;
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

        //The external program accessing this API
        app()->bind('Update_Program',function(){
            //Ensure these option query parameters are ALWAYS validated
            app()->request->validate([
                'limit' => ['lte:100','gte:1'],
                'details_limit' => ['lte:25','gte:1'],
                'offset' => ['gte:0'],
                'details_offset' => ['gte:0'],
                'include_details' => ['gte:0','lte:5'],
            ]);
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Header_Field_Required('client-id',$this->toolbelt->Use_Tables()->Get_Programs()->Get_Column('client_id'));
            $program = new Program;
            $program->Load_Program_By_Client_ID(app()->request->header('client-id'));
            return $program;
        });
        //The company that belongs to the user logged in
        app()->bind('Create_Company',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('company',$this->toolbelt->Use_Tables()->Get_Companies()->Get_Column('id'));
            $company = new Company;
            $company->Load_Object_By_ID(app()->request->company);
            return $company;
        });
        app()->bind('Update_Company',function(){
            $company = new Company;
            $company->Load_Object_By_ID($this->toolbelt->Use_Objects()->Get_Program_Session(3)->Get_Company_ID());
            return $company;
        });
        //The company as a resource being edited/created
        app()->bind('Create_New_Company',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('company_name',$this->toolbelt->Use_Tables()->Get_Companies()->Get_Column('company_name'));
            $company = new Company;
            return $company;
        });
        app()->bind('Delete_New_Company',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('company',$this->toolbelt->Use_Tables()->Get_Companies()->Get_Column('id'));
            $company = new Company;
            $company->Load_Object_By_ID(app()->request->company);
            return $company;
        });
        app()->bind('Update_New_Company',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('company',$this->toolbelt->Use_Tables()->Get_Companies()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Int_Field('company_name',$this->toolbelt->Use_Tables()->Get_Companies()->Get_Column('company_name'));
            $company = new Company;
            $company->Load_Object_By_ID(app()->request->company);
            return $company;
        });
        app()->bind('Create_Company_Role',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('role_name',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('role_name'));
            $company_role = new Company_Role;
            return $company_role;
        });
        app()->bind('Delete_Company_Role',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('company_role',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('id'));
            $company_role = new Company_Role;
            $company_role->Load_Object_By_ID(app()->request->company_role);
            return $company_role;
        });
        app()->bind('Update_Company_Role',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('company_role',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('id'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('role_name',$this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_Column('role_name'));
            $company_role = new Company_Role;
            $company_role->Load_Object_By_ID(app()->request->company_role);
            return $company_role;
        });
        app()->bind('Create_Program_Session',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('user',$this->tables->Get_Users(false)->Get_Column('username'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('password',$this->toolbelt->Use_Tables()->Get_Users(false)->Get_Column('verified_hashed_password'));
            $session = new Program_Session;
            return $session;
        });
        app()->bind('Update_Program_Session',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Header_Field_Required('User-Access-Token',$this->toolbelt->Use_Tables()->Get_Programs_Have_Sessions()->Get_Column('access_token'));
            $session = new Program_Session;
            $session->Load_Session_By_Access_Token(app()->request->header('User-Access-Token'));
            if($session->Is_Expired())
            {
                $this->toolbelt->Use_Functions()->Response_422(['message' => 'The User-Access-Token has expired.','links' => [
                    'href' => route('User_Signin',['company' => $session->Get_Company_ID()]),
                    'type' => 'POST'
                ]])->send();
                exit();
            }
            return $session;
        });
        app()->bind('Delete_Program_Session',function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Header_Field_Required('User-Access-Token',$this->toolbelt->Use_Tables()->Get_Programs_Have_Sessions()->Get_Column('access_token'));
            $session = new Program_Session;
            $session->Load_Session_By_Access_Token(app()->request->header('User-Access-Token'));
            return $session;
        });
        app()->bind('Update_Route', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_Int_Parameter('route',$this->toolbelt->Use_Tables()->Get_Routes()->Get_Column('id'));
            $route = new Route;
            $route->Load_Object_By_ID(app()->request->route);
            return $route;
        });
        app()->bind('Create_User', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('user',$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('username'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field_Required('password',$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('verified_hashed_password'));
            $columns = [];
            $this->toolbelt->Use_Tables()->Get_Users()->Get_Column('company_id')->Set_Field_Value($this->toolbelt->Use_Objects()->Get_Company()->Get_Verified_ID());
            $this->toolbelt->Use_Tables()->Get_Users()->Get_Column('project_name')->Set_Field_Value($this->toolbelt->Use_cConfigs()->Get_Name_Of_Project());
            $columns[] = $this->toolbelt->Use_Tables()->Get_Users()->Get_Column('company_id');
            $columns[] = $this->toolbelt->Use_Tables()->Get_Users()->Get_Column('project_name');
            app()->request->validate([
                'user' => [new Validate_Unique_Value_In_Columns($columns,$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('username'))],
            ]);
            $user = new User(app()->request->input('user'),app()->request->input('password'),$this->toolbelt->Use_Objects()->Get_Company(),true);
            return $user;
        });
        app()->bind('Update_User', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_String_Parameter('user',$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('username'));
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Post_Field('new_password',$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('verified_hashed_password'));
            $user = new User(app()->request->user,'skip_check',$this->toolbelt->Use_Objects()->Get_Company(),false,false);
            return $user;
        });
        app()->bind('Delete_User', function(){
            $this->toolbelt->Use_Laravel_Toolbelt()->Validate_Uri_String_Parameter('user',$this->toolbelt->Use_Tables()->Get_Users()->Get_Column('username'));
            try
            {
                $user = new User(app()->request->user,'skip_check',$this->toolbelt->Use_Objects()->Get_Company(),false,false);
            } catch (\app\Helpers\User_Does_Not_Exist $e)
            {
                $this->toolbelt->Use_Functions()->Response_422(['message' => 'User does not exist'],app()->request)->send();
                exit();
            } catch (\Active_Record\Object_Is_Currently_Inactive $e)
            {
                $this->toolbelt->Use_Functions()->Response_422(['message' => 'The user is currently inactive and must first be reactivated.'],app()->request)->send();
                exit();
            }
            return $user;
        });
    }


}
