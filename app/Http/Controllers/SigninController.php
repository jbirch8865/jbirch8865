<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class SigninController extends Controller
{

    public function store(Request $request,int $company_id)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        $request->validate([
            'user_name' => ['required','max:'.$toolbelt->Users->Get_Column('username')->Get_Data_Length()],
            'plain_text_password' => ['required','max:'.$toolbelt->Users->Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
        if(!$request->headers->has('Secret-Token'))
        {
            return response()->json([
                'message' => 'The Secret header with secret Secret-Token is required.'
            ],422);
        }
        if(strlen($request->header('Authorization-Token')) > $toolbelt->Programs->Get_Column('client_id')->Get_Data_Length() ||
        strlen($request->header('Secret-Token')) > $toolbelt->Programs->Get_Column('secret')->Get_Data_Length())
        {
            return response()->json([
                'message' => 'Authorization-Token or Secret-Token is malformed'
            ],422);
        }
        try
        {
            $session = new \API\Program_Session;
            $session->Create_New_Session($request->header('Authorization-Token'),$request->header('Secret-Token'),$company_id,$request->input('user_name'),$request->input('plain_text_password')); 
        } catch (\Authentication\Incorrect_Password $e)
        {
            return response()->json([
                'message' => 'credentials incorrect'
            ],401);
        } catch (\Authentication\User_Does_Not_Exist $e)
        {
            return response()->json([
                'message' => 'credentials incorrect'
            ],401);
        } catch (\Active_Record\Active_Record_Object_Failed_To_Load $e)
        {
            return response()->json([
                'message' => 'The Authorization-Token or Secret-Token is not valid.'
            ],400);
        }
        return response()->json([
            'session_token' => $session->Get_Access_Token(),
            'expires' => $session->Get_Experation()
        ],201);
    }

    public function destroy(Request $request)
    {
        //
    }
}
