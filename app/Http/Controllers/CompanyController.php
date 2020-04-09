<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Programs;
use app\Facades\Companies;
/**
 * @group Company
 * 
 */
class CompanyController extends Controller
{
/*
    public function index(Request $request)
    {
    }
*/
    /**
     * {POST} api/v1/Company
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
            $company->Create_Company_Role('master');
            $password = Generate_CSPRNG(14);
            $user = new \Authentication\User('default',$password,$company,true);
            $user_role = new \Authentication\User_Role;
            $user_role->Set_Role($company->Company_Roles[0],false);
            $user_role->Set_User($user);            
        } catch (\Active_Record\UpdateFailed $e)
        {
            return Response_422(['message' => 'Company already exists'],$request);
        }
        return Response_201([
            'message' => 'Company successfully created',
            'master_password' => $password,
            'company' => $company->Get_Response_Collection(2)
        ],$request);
    }

}
