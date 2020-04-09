<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML\Voice\Pay;
use app\Facades\Users;

/**
 * @group Company
 * 
 */

class UserController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * {POST} api/v1/{company_id}/User
     * 
     * Create a user
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required','max:'.Users::Get_Column('username')->Get_Data_Length()],
            'password' => ['required','max:'.Users::Get_Column('verified_hashed_password')->Get_Data_Length()],
        ]);
        try
        {
            $user = new \Authentication\User($request->input('username'),$request->input('password'),app()->make('Company'),true);
        } catch (\Authentication\Incorrect_Password $e)
        {
            return Response_422(['message' => 'Sorry the user already exists'],$request);
        } catch (\Active_Record\Object_Is_Currently_Inactive $e)
        {
            return Response_422(['message' => 'This user already exists and is currently inactive'],$request);
        }
        return Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $user->Get_Response_Collection(1)
        ],$request);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
