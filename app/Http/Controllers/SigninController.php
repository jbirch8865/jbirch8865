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
    /**
     * {POST} signin/{company}/v1/api
     *
     * Returns a unique access_token used to authenticate in place of the username and password
     * The access_token experation date is based on the company_config session_timeout which is comany specific
     */
    public function store(Request $request,int $company_id)
    {
        $program_session = app()->make('Program_Session_Username');
        return Response_201([
            'Program_Session' => $program_session->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {DELETE} {user}/signin/{company}/v1/api
     *
     */
    public function destroy($co,$user_name)
    {
        $toolbelt = new \toolbelt;
        $username = $toolbelt->dblink->dblink->Escape_String($user_name);
        $toolbelt->Users->Query_Single_Table(['id'],false,"WHERE `username` = '".$username."'");
        $user_id = $toolbelt->Users->Get_Queried_Data();
        $user_id = $user_id['id'];
        $toolbelt->Programs_Have_Sessions->Query_Single_Table(['access_token'],false,"WHERE `user_id` = '".$user_id."'");
        $access_token = $toolbelt->Programs_Have_Sessions->Get_Queried_Data();
        $access_token = $access_token['access_token'];
        $program_session = new \app\Helpers\Program_Session;
        $program_session->Load_Session_By_Access_Token($access_token);
        $program_session->Revoke_Session();
        return Response_201(['message' => 'Session revoked',
            'Program_Session' => $program_session->Get_API_Response_Collection()
        ],app()->request);
    }

}
