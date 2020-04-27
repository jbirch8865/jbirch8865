<?php

namespace App\Http\Controllers;
use app\Facades\Users;
use App\Rules\Validate_Active_Status_True;
use App\Rules\Validate_Object_With_ID;
use App\Rules\Validate_Value_Exists_In_Column;
use Illuminate\Http\Request;
/**
 * @group Company
 * Basic CRUD operations for Companies, Company Configs and Users
 */
class UsersController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {GET} users/v1/api
     * Return a list of users belonging to the company
     *
     */
    public function index(Request $request)
    {
        $company = $this->toolbelt->Get_Company();
        $this->toolbelt->Users->LimitBy($this->toolbelt->Users->Get_Column('company_id')->
        Equals($this->toolbelt->Get_Company()->Get_Verified_ID()));
        $this->toolbelt->Users->Query_Table(['username']);
        $users = array();
        $count = 0;
        While($row = $this->toolbelt->Users->Get_Queried_Data())
        {
            $user = new \app\Helpers\User($row['username'],'skip_check',$company,false,$request->input('include_disabled',false));
            $users[$row['username']] = $user->Get_API_Response_Collection();
        }
        return Response_200([
            'message' => array('Users' => $users)
        ],$request);
    }
    /**
     * {POST} users/v1/api
     *
     * Create a user
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_roles' => ['required','array'],
            'company_roles.*.id' => ['int','required',new Validate_Value_Exists_In_Column($this->toolbelt->Company_Roles->Get_Column('id'))]
        ]);
        if($request->user == 'default')
        {
            return Response_422(['message' => 'Default user already created'],$request);
        }
        $user = $this->toolbelt->Get_User(2);
        $user->Remove_All_Roles();
        ForEach($request->input('company_roles') as $company_role)
        {
            $role = new \app\Helpers\Company_Role;
            $role->Load_Object_By_ID($company_role['id']);
            $user->Assign_Company_Role($role);
        }
        return Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $user->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {PUT} {user}/users/v1/api
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
            'new_password' => ['Max:'.$this->toolbelt->Users->Get_Column('verified_hashed_password')->Get_Data_Length()],
            'company_roles' => ['Required','Array'],
            'company_roles.*.id' => ['Required','Integer','required_with:company_roles',new Validate_Value_Exists_In_Column($this->toolbelt->Company_Roles->Get_Column('id'))],
            'active_status' => ['Required','Boolean',new Validate_Active_Status_True]
        ]);
        $user = $this->toolbelt->Get_User(3);
        $user->Change_Password($request->input('new_password'));
        $user->Remove_All_Roles();
        ForEach($request->input('company_roles') as $company_role)
        {
            $role = new \app\Helpers\Company_Role;
            $role->Load_Object_By_ID($company_role['id']);
            $user->Assign_Company_Role($role);
        }
        $user->Set_Active_Status(true);
        return Response_201(['message' => 'User successfully updated',
        'user' => $user->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {user}/users/v1/api
     *
     */
    public function destroy(Request $request, $id)
    {
        $user = $this->toolbelt->Get_User(3);
        $user->Delete_Active_Record();
        return Response_201(['message' => 'User Successfully Deleted',
        'user' => $user->Get_API_Response_Collection()],$request);

    }
}
