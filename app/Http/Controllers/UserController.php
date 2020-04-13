<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $user = app()->make('Create_User');
        return Response_201([
            'message' => 'User successfully created or already exists with that password',
            'user' => $user->Get_API_Response_Collection()
        ],$request);
    }

    public function show($id)
    {
        //
    }
    /**
     * {PUT} api/v1/{company}/user/{user}
     * Currently this endpoint is only able to change a password
     * Please note that the User-Access-Token does not have to be the access token for the username
     * you are changing the password for.  It just needs to be a user that has rights to this endpoint.
     * Currently there is no way for the User to change their own password if they don't have rights
     * to this endpoint.  So you would need to first authenticate with a user who does have rights to change
     * the password.
     * @urlParam user required this is the username not id
     */
    public function update(Request $request, $id)
    {
        $user = app()->make('Update_User');
        $user->Change_Password($request->input('new_password'));
        return Response_201(['message' => 'password successfully changed',
        'user' => $user->Get_API_Response_Collection()],$request);
    }

    public function destroy($id)
    {

    }
}
