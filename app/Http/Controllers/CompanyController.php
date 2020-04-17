<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Companies;
use app\Helpers\User;
use app\Helpers\User_Role;
/**
 * @group Company
 *
 */
class CompanyController extends Controller
{
    /**
     * {GET} app/v1/companies
     * List all companies
     *
     * @queryParam include_disabled if set will only return active companies Example: true
     * @queryParam include_details is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled Example: 2
     * @queryParam details_offset a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0 Example: 0
     * @queryParam details_limit a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1 Example: 1
     * @queryParam offset a number between 0 and infinite that represents which object to start with default is 0 Example: 0
     * @queryParam limit a number between 1 and 100 representing the number of records to return after the offset default is 50 Example: 1
     */
    public function index(Request $request)
    {

        if($request->input('include_disabled',false))
        {
            Companies::Query_Single_Table(array('id'),false,"LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
        }else
        {
            Companies::Query_Single_Table(array('id'),false,"WHERE `Active_Status` = '1' LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
        }
        $Companies = array();
        While($row = Companies::Get_Queried_Data())
        {
            $company = new \app\Helpers\Company;
            $company->Load_Company_By_ID($row['id']);
            if($request->input('include_details',false))
            {
                $Companies[$company->Get_Company_Name()] = $company->Get_API_Response_Collection();
            }else
            {
                $Companies[$company->Get_Company_Name()] = $company->Get_Verified_ID();
            }
        }
        return Response_200([
            'message' => 'List of Current Companies',
            'Companies' => $Companies
        ],$request);
    }

    /**
     * {POST} api/v1/company
     *
     * This framework doesn't allow a company to do anything unless there is an authorized user making the request.
     * So as part of creating a company this will auto create a master role that has access to all methods on all routes
     * It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
     * Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required','max:'.Companies::Get_Column('company_name')->Get_Data_Length()]
        ]);
        $company = new \app\Helpers\Company;
        try
        {
            $company->Set_Company_Name($request->input('company_name'));
            $company->Create_Company_Role('master',true,true,true,true,true);
            $password = Generate_CSPRNG(14);
            $user = new User('default',$password,$company,true);
            $user_role = new User_Role;
            $user_role->Set_Role($company->Company_Roles[0],false);
            $user_role->Set_User($user);
        } catch (\Active_Record\UpdateFailed $e)
        {
            return Response_422(['message' => 'Company already exists'],$request);
        }
        return Response_201([
            'message' => 'Company successfully created',
            'master_password' => $password,
            'company' => $company->Get_API_Response_Collection()
        ],$request);
    }

}
