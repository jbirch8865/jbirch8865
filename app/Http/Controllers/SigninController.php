<?php

namespace App\Http\Controllers;
use app\Facades\Program_Session;
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
     * 
     */
    public function store(Request $request,int $company_id)
    {
        $request->validate([
            'username' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
            'plain_text_password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
        if(!$request->headers->has('Secret-Token'))
        {
            return Response_422(['message' => 'The Secret header with secret Secret-Token is required.'],$request);
        }
        if(strlen($request->header('Authorization-Token')) > Programs::Get_Column('client_id')->Get_Data_Length() ||
        strlen($request->header('Secret-Token')) > Programs::Get_Column('secret')->Get_Data_Length())
        {            
            return Response_422(['message' => 'Authorization-Token or Secret-Token is malformed.'],$request);
        }
        try
        {
            Program_Session::Create_New_Session($request->header('Authorization-Token'),$company_id,$request->input('username'),$request->input('plain_text_password')); 
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
            'session_token' => Program_Session::Get_Access_Token(),
            'expires' => Program_Session::Get_Experation(),
            'user' => Program_Session::Get_Username()
        ],$request);
    }
}
