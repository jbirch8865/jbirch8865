<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Company_Roles;
use app\Facades\Routes;
use app\Facades\Company_Role;
use App\Rules\Route_Right_Required;
use App\Rules\Validate_Established_Friendly_Name;
use App\Rules\Validate_Name_Is_Not_Already_Taken;
use App\Rules\Validate_Object_With_ID;
use App\Rules\Validate_Route_Module_Name;
use App\Rules\Validate_Unique_Friendly_Name;

/**
 * @group Company
 */
class CompanyRole extends Controller
{
    /**
     * {GET} roles/{company}/v1/api
     *
     */
    public function index(Request $request)
    {
        return Company_Roles::Get_All_Objects('Company_Role',$request);
    }

    private function Process_By_Route_ID(array $route_info,\app\Helpers\Company_Role &$role)
    {
        $route_role = new \app\Helpers\Route_Role;
        $route = new \app\Helpers\Route;
        $route->Load_Object_By_ID($route_info['route_id']);
        $route_role->Load_From_Route_And_Role($route,$role);
        $right = new \app\Helpers\Right;
        $right->Load_Right_By_ID($route_role->Get_Right_ID());
        if($route_info['Rights']['get'] == true)
        {
            $right->Allow_Get();
        }else
        {
            $right->Deny_Get();
        }
        if($route_info['Rights']['post'] == true)
        {
            $right->Allow_Post();
        }else
        {
            $right->Deny_Post();
        }
        if($route_info['Rights']['patch'] == true)
        {
            $right->Allow_Patch();
        }else
        {
            $right->Deny_Patch();
        }
        if($route_info['Rights']['put'] == true)
        {
            $right->Allow_Put();
        }else
        {
            $right->Deny_Put();
        }
        if($route_info['Rights']['destroy'] == true)
        {
            $right->Allow_Destroy();
        }else
        {
            $right->Deny_Destroy();
        }

    }
    /**
     * {POST} roles/{company}/v1/api
     *
     * So a company role is just a company and a name
     * However, in order to create a company you need to provide
     * an array of routes and the associated rights you would like
     * with that route.
     *
     * @bodyParam Routes_Have_Roles.*.module string if route_id is missing then the module name will be used to create rights with multiple roles.
     * @bodyParam Routes_Have_Roles.*.route_id string if route_id is missing then the module name will be used to create rights with multiple roles.
     * @bodyParam Routes_Have_Roles.*.get bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.post bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.put bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.patch bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.delete bool true allows method false denys method
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required','string',new Validate_Unique_Friendly_Name('\\app\\Helpers\\Company_Role')],
            'Routes_Have_Roles.*.route_id' => ['required_without:Routes_Have_Roles.*.module','integer','gt:0','bail',new Validate_Object_With_ID('\\app\\Helpers\\Route'),new Route_Right_Required],
            'Routes_Have_Roles.*.module' => ['required_without:Routes_Have_Roles.*.route_id','string','gt:'.Routes::Get_Column('module')->Get_Data_Length(),new Validate_Route_Module_Name],
            'Routes_Have_Roles.*.Rights.get' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.destroy' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.post' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.patch' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.put' => ['bool','required']
        ]);
        $company = app()->make('Company');
        $company->Create_Company_Role($request->input('role_name'),false,false,false,false,false);
        $role = new \app\Helpers\Company_Role;
        $role->Load_Role_By_Name($request->input('role_name'));
        global $documentation_role_id_to_delete;
        $documentation_role_id_to_delete = $role->Get_Verified_ID();
        ForEach($request->input('Routes_Have_Roles') as $route_info)
        {
            if(isset($route_info['route_id']))
            {
                $this->Process_By_Route_ID($route_info,$role);
            }else
            {
                $toolbelt = new \toolbelt;
                $toolbelt->Routes->Query_Single_Table(['id'],false,"WHERE `module` = '".$route_info['module']."'");
                while($row = $toolbelt->Routes->Get_Queried_Data())
                {
                    $route_info['route_id'] = $row['id'];
                    $this->Process_By_Route_ID($route_info,$role);
                }
            }
        }
        return Response_201([
            'message' => 'Company Role created',
            'company role' => $role->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {PUT} roles/{company}/v1/api
     *
     * This will recreate the role with the provided modal
     * Anything previous will be deleted so make sure this
     * is the complete modal you are expecting
     *
     * @bodyParam Routes_Have_Roles.*.module string if route_id is missing then the module name will be used to create rights with multiple roles. Example Company
     * @bodyParam Routes_Have_Roles.*.route_id int if route_id is missing then the module name will be used to create rights with multiple roles.
     * @bodyParam Routes_Have_Roles.*.get bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.post bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.put bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.patch bool true allows method false denys method
     * @bodyParam Routes_Have_Roles.*.delete bool true allows method false denys method
     */
    public function update(Request $request, $i,$id)
    {
        $request->validate([
            'role_name' => ['string', new Validate_Name_Is_Not_Already_Taken('app\\Helpers\\Company_Role')],
            'Routes_Have_Roles.*.route_id' => ['required_without:Routes_Have_Roles.*.module','integer','gt:0','bail',new Validate_Object_With_ID('\\app\\Helpers\\Route'),new Route_Right_Required],
            'Routes_Have_Roles.*.module' => ['required_without:Routes_Have_Roles.*.route_id','string','lte:'.Routes::Get_Column('module')->Get_Data_Length(),new Validate_Route_Module_Name],
            'Routes_Have_Roles.*.Rights.get' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.destroy' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.post' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.patch' => ['bool','required'],
            'Routes_Have_Roles.*.Rights.put' => ['bool','required'],
            'active_status' => ['bool']
        ]);

        $role = new \app\Helpers\Company_Role;
        $role->Load_Object_By_ID($id);
        $role->Set_Active_Status($request->input('active_status'));
        if($request->input('role_name',false))
        {
            $role->Set_Role_Name($request->input('role_name'));
        }
        ForEach($request->input('Routes_Have_Roles') as $route_info)
        {
            if(isset($route_info['route_id']))
            {
                $this->Process_By_Route_ID($route_info,$role);
            }else
            {
                $toolbelt = new \toolbelt;
                $toolbelt->Routes->Query_Single_Table(['id'],false,"WHERE `module` = '".$route_info['module']."'");
                while($row = $toolbelt->Routes->Get_Queried_Data())
                {
                    $route_info['route_id'] = $row['id'];
                    $this->Process_By_Route_ID($route_info,$role);
                }
            }
        }
        return Response_201([
            'message' => 'Company Role Updated',
            'company role' => $role->Get_API_Response_Collection()
        ],$request);

    }

    /**
     * {DELETE} roles/{company}/v1/api
     */
    public function destroy($id,$role_id)
    {
        $company_role = new \app\Helpers\Company_Role;
        try
        {
            $company_role->Load_Object_By_ID($role_id);
            $company_role->Delete_Active_Record();
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return Response_422(['message' => 'Sorry the role id '.$id.' is not a valid role'],app()->request);
        }
        if(app()->request->input('active_status'))
        {
            return Response_201(['message' => 'Role successfully deactivated',
                'Company_Role' => $company_role->Get_API_Response_Collection()],app()->request);
        }else
        {
            return Response_201(['message' => 'Role successfully deleted'],app()->request);
        }
    }
}
