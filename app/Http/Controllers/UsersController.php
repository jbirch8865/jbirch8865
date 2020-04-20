<?php

namespace App\Http\Controllers;
use app\Facades\Users;
use App\Rules\Validate_Active_Status_True;
use App\Rules\Validate_Object_With_ID;
use Illuminate\Http\Request;
/**
 * @group Company
 * Basic CRUD operations for Companies, Company Configs and Users
 */
class UsersController extends Controller
{
    /**
     * {GET} users/{company}/v1/api
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
     * {POST} users/{company}/v1/api
     *
     * Create a user
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_roles' => ['array'],
            'company_roles.*' => ['int','required_with:company_roles',new Validate_Object_With_ID('app\\Helpers\\Company_Role')]
        ]);
        if($request->user == 'default')
        {
            return Response_422(['message' => 'Default user already created'],$request);
        }
        $user = app()->make('Create_User');
        $roles = $request->input('company_roles');
        if(!is_null($roles))
        {
            ForEach($roles as $role_id)
            {
                $role = new \app\Helpers\Company_Role;
                $role->Load_Object_By_ID($role_id);
                $user->Assign_Company_Role($role);
            }
        }
        return Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $user->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {PUT} {user}/users/{company}/v1/api
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
            'new_password' => ['Max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
            'company_roles' => ['Required','Array'],
            'company_roles.*' => ['Required','Integer','required_with:company_roles',new Validate_Object_With_ID('app\\Helpers\\Company_Role')],
            'active_status' => ['Required','Boolean',new Validate_Active_Status_True]
        ]);
        $user = app()->make('Update_User');
        $user->Remove_All_Roles();
        $user->Change_Password($request->input('new_password'));
        $user->Set_Active_Status(true);
        return Response_201(['message' => 'User successfully updated',
        'user' => $user->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {user}/users/{company}/v1/api
     *
     */
    public function destroy(Request $request, $id)
    {
        $user = app()->make('Update_User');
        $user->Delete_Active_Record();
        return Response_201(['message' => 'User Successfully Deleted',
        'user' => $user->Get_API_Response_Collection()],$request);

    }
}
