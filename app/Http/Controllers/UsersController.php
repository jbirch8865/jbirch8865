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
     * @queryParam include_disabled if set will only return active users Example: true
     * @queryParam offset a number between 0 and infinite that represents which object to start with default is 0 Example: 0
     * @queryParam limit a number between 1 and 100 representing the number of records to return after the offset default is 50 Example: 2
     * 
     */
    public function index(Request $request,int $company_id)
    {
        if($request->input('include_disabled',false))
        {
            Users::Query_Single_Table(array('id','username','active_status'),false,"WHERE `company_id` = '".$company_id."' LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
        }else
        {
            Users::Query_Single_Table(array('id','username','active_status'),false,"WHERE `company_id` = '".$company_id."' AND `Active_Status` = '1' LIMIT ".$request->input('offset',0).", ".$request->input('limit',50));
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