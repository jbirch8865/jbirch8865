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
     * List all companies
     *
     * @queryParam include_disabled if set will only return active companies Example: true
     * @queryParam include_details is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled Example: 2
     * @queryParam details_offset a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0 Example: 0
     * @queryParam details_limit a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1 Example: 1
     * @queryParam offset a number between 0 and infinite that represents which object to start with default is 0 Example: 0
     * @queryParam limit a number between 1 and 100 representing the number of records to return after the offset default is 50 Example: 1
     *
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Get_Companies()->Get_All_Objects('Company',$request);
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
        $request->validate([
            'company_name' => ['required','max:'.$this->toolbelt->Get_Companies()->Get_Column('company_name')->Get_Data_Length(),new Validate_Unique_Value_In_Column($this->toolbelt->Get_Companies()->Get_Column('company_name'))]
        ]);
        $company = new \app\Helpers\Company;
        $company->Set_Company_Name($request->input('company_name'));
        global $documentation_company_id_to_delete;
        $documentation_company_id_to_delete = $company->Get_Verified_ID();
        $password = Generate_CSPRNG(14);
        $user = new \app\Helpers\User('default',$password,$company,true);
        $user_role = new \app\Helpers\User_Role;
        $user_role->Set_Role($company->Company_Roles[0],false);
        $user_role->Set_User($user);
        return Response_201([
            'message' => 'Company successfully created',
            'master_password' => $password,
            'company' => $company->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {DELETE} {company}/companies/v1/api
     */
    public function destroy($id)
    {
        $this->helperprovider->Validate_Uri_Int_Parameter('company',$this->toolbelt->Get_Companies()->Get_Column('id'));
        $company = new Company;
        $company->Load_Object_By_ID(app()->request->company);
        $company->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return Response_201(['message' => 'Company Disabled',
            'Company' => $company->Get_API_Response_Collection()],app()->request);
        }else
        {
            return Response_201(['message' => 'Company Deleted'],app()->request);
        }
    }

}
