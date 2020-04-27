<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Authentication
 * Requesting an End User Access Token for authenticating future requests
 */
class SigninController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {POST} signin/{company}/v1/api
     *
     * Returns a unique access_token used to authenticate in place of the username and password
     * The access_token experation date is based on the company_config session_timeout which is comany specific
     */
    public function store(Request $request,int $company_id)
    {
        $this->toolbelt->Get_Program_Session(true);
        return Response_201([
            'Program_Session' => $this->toolbelt->Get_Program_Session(true)->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {DELETE} {user}/signin/{company}/v1/api
     *
     */
    public function destroy($co,$user_name)
    {
        $username = $this->toolbelt->dblink->dblink->Escape_String($user_name);
        if($this->toolbelt->Get_Program_Session()->Get_Username() != $username)
        {
            return Response_422(['message' => 'This user doesn\'t appear to belong to the user-access-token'],app()->request);
        }
        $this->toolbelt->Users->LimitBy($this->toolbelt->Users->Get_Column('company_id')->Equals($this->toolbelt->Get_Company()->Get_Verified_ID()));
        $this->toolbelt->Users->AndLimitBy($this->toolbelt->Users->Get_Column('username')->Equals($username));
        $this->toolbelt->Users->Query_Table(['id']);
        $user_id = $this->toolbelt->Users->Get_Queried_Data();
        $user_id = $user_id['id'];
        $this->toolbelt->Programs_Have_Sessions->Query_Single_Table(['access_token'],false,"WHERE `user_id` = '".$user_id."'");
        $access_token = $this->toolbelt->Programs_Have_Sessions->Get_Queried_Data();
        $access_token = $access_token['access_token'];
        $program_session = new \app\Helpers\Program_Session;
        $program_session->Load_Session_By_Access_Token($access_token);
        $program_session->Revoke_Session();
        return Response_201(['message' => 'Session revoked',
            'Program_Session' => $program_session->Get_API_Response_Collection()
        ],app()->request);
    }

}
