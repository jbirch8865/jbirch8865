<?php

namespace App\Http\Controllers;
use app\Facades\Users;
use app\Helpers\User;
use App\Rules\Validate_Active_Status_True;
use App\Rules\Validate_Object_With_ID;
use App\Rules\Validate_Value_Exists_In_Column;
use Illuminate\Http\Request;
/**
 * @group Company
 *
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
     *
     * Return a list of users belonging to the company
     *
     */
    public function index(Request $request)
    {
        $company = $this->toolbelt->Use_Objects()->Get_Company();
        $this->toolbelt->Use_Tables()->Get_Users()->Query_Table(['username'],true);
        $users = array();
        $count = 0;
        While($row = $this->toolbelt->Use_Tables()->Get_Users()->Get_Queried_Data())
        {
            $user = new \app\Helpers\User($row['username'],'skip_check',$company,false,$request->input('include_disabled',false));
            $users[$row['username']] = $user->Get_API_Response_Collection();
        }
        return $this->toolbelt->Use_Functions()->Response_200([
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
        return $this->toolbelt->Use_Functions()->Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $this->toolbelt->Use_Objects()->Get_User(2)->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {PUT} {user}/users/v1/api
     *
     */
    public function update(Request $request, $id)
    {
        $user = $this->toolbelt->Use_Objects()->Get_User(3);
        $user->Change_Password($request->input('new_password'));
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'User successfully updated',
        'user' => $user->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {user}/users/v1/api
     *
     */
    public function destroy(Request $request, $id)
    {
        $user = $this->toolbelt->Use_Objects()->Get_User(1);
        $user->Delete_Active_Record();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'User Successfully Deleted/Disabled',
        'user' => $user->Get_API_Response_Collection()],$request);

    }
}
