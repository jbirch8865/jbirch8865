<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Authentication
 * Requesting an End User Access Token for authenticating future requests
 */
class SigninController extends Controller
{
    /**
     * 
     */
    public function store(Request $request,int $company_id)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        $request->validate([
            'user_name' => ['required','max:'.$toolbelt->Users->Get_Column('username')->Get_Data_Length()],
            'plain_text_password' => ['required','max:'.$toolbelt->Users->Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
        if(!$request->headers->has('Secret-Token'))
        {
            return Response_422(['message' => 'The Secret header with secret Secret-Token is required.'],$request);
        }
        if(strlen($request->header('Authorization-Token')) > $toolbelt->Programs->Get_Column('client_id')->Get_Data_Length() ||
        strlen($request->header('Secret-Token')) > $toolbelt->Programs->Get_Column('secret')->Get_Data_Length())
        {            
            return Response_422(['message' => 'Authorization-Token or Secret-Token is malformed.'],$request);
        }
        try
        {
            $session = new \API\Program_Session;
            $session->Create_New_Session($request->header('Authorization-Token'),$request->header('Secret-Token'),$company_id,$request->input('user_name'),$request->input('plain_text_password')); 
        } catch (\Authentication\Incorrect_Password $e)
        {
            return Response_401(['message' => 'credentials incorrect.'],$request);
        } catch (\Authentication\User_Does_Not_Exist $e)
        {
            return Response_401(['message' => 'credentials incorrect.'],$request);
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return Response_400(['message' => 'The Authorization-Token or Secret-Token is not valid.'],$request);
        }
        return Response_201([
            'session_token' => $session->Get_Access_Token(),
            'expires' => $session->Get_Experation()
        ],$request);
    }
}
