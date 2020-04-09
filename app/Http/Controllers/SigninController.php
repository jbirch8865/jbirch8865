<?php

namespace App\Http\Controllers;
use app\Facades\Programs;
use app\Facades\Users;
use Illuminate\Http\Request;
/**
 * @group Authentication
 * Requesting an End User Access Token for authenticating future requests
 */
class SigninController extends Controller
{
    /**
     * {POST} api/v1/{company_id}/Signin
     * 
     * Returns a unique access_token used to authenticate in place of the username and password
     * The access_token experation date is based on the company_config session_timeout which is comany specific
     */
    public function store(Request $request,int $company_id)
    {
        $request->validate([
            'username' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
            'password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
        try
        {
            /**I don't want to bind actually getting the user access token, the bound Program_Session service is expecting the user access token  */
            $program_sesson = new \API\Program_Session;
            $program_sesson->Create_New_Session($request->header('client-id'),app()->make('Company'),$request->input('username'),$request->input('password')); 
        } catch (\Authentication\Incorrect_Password $e)
        {
            return Response_401(['message' => 'credentials incorrect.'],$request);
        } catch (\Authentication\User_Does_Not_Exist $e)
        {
            return Response_401(['message' => 'credentials incorrect.'],$request);
        } catch (\Active_Record\Object_Is_Currently_Inactive $e)
        {
            return Response_401(['message' => 'The user is currently inactive.'],$request);
        }
        return Response_201([
            'Program_Session' => $program_sesson->Get_Response_Collection(4)
        ],$request);
    }
}
