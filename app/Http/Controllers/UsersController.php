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
     * {GET} api/v1/{company}/users
     * Return a list of users belonging to the company
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
        $users = array();
        $count = 0;
        $company = app()->make('Company');
        While($row = Users::Get_Queried_Data())
        {
            $user = new \app\Helpers\User($row['username'],'skip_check',$company,false,$request->input('include_disabled',false));
            $users[$row['username']] = $user->Get_API_Response_Collection();
        }
        return Response_200([
            'message' => array('Users' => $users)
        ],$request);
    }

    /**
     * {PUT} api/v1/{company}/user/{user}
     * Currently this endpoint is only able to change a password and re-enable a disabled user
     * Please note that the User-Access-Token does not have to be the access token for the username
     * you are changing the password for.  It just needs to be a user that has rights to this endpoint.
     * Currently there is no way for the User to change their own password if they don't have rights
     * to this endpoint.  So you would need to first authenticate with a user who does have rights to change
     * the password.  This could be accomplished by first enabling the default user, authenticating and updating
     * the password.  Then remember to disable the default user.
     */
    public function update(Request $request, $id)
    {
        app()->request->validate([
            'new_password' => ['max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
            'active_status' => ['bool']
        ]);
        $user = app()->make('Update_User');
        $user->Change_Password($request->input('new_password'));
        $user->Set_Active_Status((bool) $request->input('active_status'));
        return Response_201(['message' => 'User successfully updated',
        'user' => $user->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} api/v1/{company}/user/{user}
     *
     */
    public function destroy(Request $request, $id)
    {
        $user = app()->make('Update_User');
        $user->Delete_User($request->input('active_status'));
        return Response_201(['message' => 'User Successfully Deleted',
        'user' => $user->Get_API_Response_Collection()],$request);

    }
}
