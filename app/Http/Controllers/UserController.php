<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * {POST} api/v1/{company}/user
     *
     * Create a user
     *
     */
    public function store(Request $request)
    {
        /*
        $request->validate(['username' => [
            function ($attribute, $value, $fail){
                if(strtolower($value) === 'default')
                {
                    $fail('Default user is already created and cannot be recreated');
                }
            },
        ]]);
        */
        $user = app()->make('Create_User');
        return Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $user->Get_API_Response_Collection()
        ],$request);
    }


    /**
     * @group Tools
     * {PUT} api/v1/{company}/default_user/{user}
     * This endpoint is exclusively to re-enable the default user specified
     * it should be used when for some reason ALL users in a company are locked out
     * or at least one person doesn't have all rights.
     */
    public function update(Request $request, $id)
    {
        app()->request->user = 'default';
        $user = app()->make('Update_User');
        $user->Set_Active_Status(true);
        return Response_201(['message' => 'Default User Enabled',
        'user' => $user->Get_API_Response_Collection()],$request);
    }

}
