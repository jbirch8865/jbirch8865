<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\Company_Role as HelpersCompany_Role;
use App\Rules\Implicitly_Allowed_Route;
use App\Rules\Validate_Unique_Value_In_Columns;
use App\Rules\Validate_Value_Exists_In_Column;

/**
 * @group Company
 */
class CompanyRole extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} company_roles/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Use_Tables()->Get_Company_Roles()->Get_All_Objects('Company_Role',$request);
    }

    /**
     * {POST} company_roles/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Company_Role(2)->Set_Role_Name($request->input('role_name'));
        return $this->toolbelt->Use_Functions()->Response_201([
            'message' => 'Company Role created',
            'company role' => $this->toolbelt->Use_Objects()->Get_Company_Role(2)->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {PUT} company_roles/v1/api
     */
    public function update(Request $request,$id)
    {
        if(app()->request->input('role_name',false))
        {
            $this->toolbelt->Use_Objects()->Get_Company_Role(3)->Set_Role_Name(app()->request->input('role_name'));
        }
        return $this->toolbelt->Use_Functions()->Response_201([
            'message' => 'Company Role Updated',
            'company role' => $this->toolbelt->Use_Objects()->Get_Company_Role(3)->Get_API_Response_Collection()
        ],$request);

    }

    /**
     * {DELETE} company_roles/v1/api
     */
    public function destroy($role_id)
    {
        $this->toolbelt->Use_Objects()->Get_Company_Role(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Role successfully deactivated',
            'Company_Role' => $this->toolbelt->Use_Objects()->Get_Company_Role(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Role successfully deleted'],app()->request);
        }
    }
}
