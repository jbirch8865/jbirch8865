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
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {POST} signin/{company}/v1/api
     *
     * Returns a unique access_token used to authenticate in place of the username and password
     * The access_token experation date is based on the company_config session_timeout which is comany specific
     */
    public function store(Request $request,int $company_id)
    {
        try
        {
            $this->toolbelt->Use_Objects()->Get_Program_Session(2)->Create_New_Session($this->toolbelt->Use_Objects()->Get_Program(),$this->toolbelt->Use_Objects()->Get_Company(false),app()->request->input('user'),app()->request->input('password'));
        } catch (\app\Helpers\Incorrect_Password $e)
        {
            return $this->toolbelt->Use_Functions()->Response_401(['message' => 'credentials incorrect.'],app()->request);
        } catch (\app\Helpers\User_Does_Not_Exist $e)
        {
            return $this->toolbelt->Use_Functions()->Response_401(['message' => 'credentials incorrect.'],app()->request);
        } catch (\Active_Record\Object_Is_Currently_Inactive $e)
        {
            return $this->toolbelt->Use_Functions()->Response_401(['message' => 'The user is currently inactive.'],app()->request);
        }
        return $this->toolbelt->Use_Functions()->Response_201([
            'Program_Session' => $this->toolbelt->Use_Objects()->Get_Program_Session(2)->Get_API_Response_Collection()
        ],$request);
    }

    /**
     * {DELETE} signin/{company}/v1/api
     *
     */
    public function destroy($co,$user_name)
    {
        $this->toolbelt->Use_Objects()->Get_Program_Session(1)->Revoke_Session();
        return $this->toolbelt->Use_Functions()->Response_201([
            'Program_Session' => $this->toolbelt->Use_Objects()->Get_Program_Session(1)->Get_API_Response_Collection()
        ]);

    }

}
