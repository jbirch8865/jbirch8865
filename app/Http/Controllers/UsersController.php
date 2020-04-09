<?php

namespace App\Http\Controllers;
use app\Facades\Users;
use Illuminate\Http\Request;
/**
 * @group Company
 * Basic CRUD operations for Companies, Company Configs and Users
 */
class UsersController extends Controller
{
    /**
     * {GET} api/v1/{company_id}/Users
     * Return a list of users belonging to the company
     * @queryParam only_active if set will only return active users Example: true
     * 
     */
    public function index(Request $request,int $company_id)
    {
        if($request->input('only_active',false))
        {
            Users::Query_Single_Table(array('id','username','active_status'),false,"WHERE `company_id` = '".$company_id."' AND `Active_Status` = '1'");
        }else
        {
            Users::Query_Single_Table(array('id','username','active_status'),false,"WHERE `company_id` = '".$company_id."'");
        }
        $Users = array();
        $count = 0;
        While($row = Users::Get_Queried_Data())
        {
            $Users[$count]['id'] = $row['id'];
            $Users[$count]['username'] = $row['username'];
            $Users[$count++]['active_status'] = (bool) $row['active_status'];
        }
        return Response_200([
            'message' => array('Users' => $Users)
        ],$request);
    }

}
