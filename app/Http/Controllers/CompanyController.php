<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Companies;
use app\Helpers\Company;
use app\Helpers\User;
use app\Helpers\User_Role;
use App\Providers\HelperServiceProvider;
use App\Rules\Validate_Unique_Value_In_Column;
use App\Rules\Validate_Value_Exists_In_Column;

/**
 * @group Company
 *
 */
class CompanyController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;
    private HelperServiceProvider $helperprovider;
    function __construct()
    {
        $this->helperprovider = new HelperServiceProvider(app());
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} companies/v1/api
     *
     * List all companies
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Use_Tables()->Get_Companies()->Get_All_Objects('Company',$request);
    }

    /**
     * {POST} company/v1/api
     *
     * This framework doesn't allow a company to do anything unless there is an authorized user making the request.
     * So as part of creating a company this will auto create a master role that has access to all methods on all routes
     * It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
     * Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated
     */
    public function store(Request $request)
    {
        $password = $this->toolbelt->Use_Objects()->Get_New_Company(2)->Create_Company_With_Users($request->input('company_name'));
        global $documentation_company_id_to_delete;
        $documentation_company_id_to_delete = $this->toolbelt->Use_Objects()->Get_New_Company(2)->Get_Verified_ID();
        return $this->toolbelt->Use_Functions()->Response_201([
            'message' => 'Company successfully created',
            'master_password' => $password,
            'company' => $this->toolbelt->Use_Objects()->Get_New_Company(2)->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {DELETE} {company}/companies/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Use_Objects()->Get_New_Company(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Company Disabled',
            'Company' => $this->toolbelt->Use_Objects()->Get_New_Company(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Company Deleted'],app()->request);
        }
    }

}
