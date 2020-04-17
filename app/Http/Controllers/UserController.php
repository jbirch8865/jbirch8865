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
}
