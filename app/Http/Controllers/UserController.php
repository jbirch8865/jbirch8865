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
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    public function index()
    {
        //
    }

    /**
     * @group Tools
     * {PUT} default_user/{company}/v1/api
     *
     * This endpoint is exclusively to re-enable the default user specified
     * it should be used when for some reason ALL users in a company are locked out
     * or at least one person doesn't have all rights.
     */
    public function update(Request $request, $id)
    {
        $user = new \app\Helpers\User('default','skip_check',$this->toolbelt->Get_Company(false),false,false);
        $user->Set_Active_Status(true);
        return Response_201(['message' => 'Default User Enabled',
        'user' => $user->Get_API_Response_Collection()],$request);
    }

}
