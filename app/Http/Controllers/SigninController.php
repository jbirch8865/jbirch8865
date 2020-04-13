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
    /**
     * {POST} api/v1/{company}/signin
     *
     * Returns a unique access_token used to authenticate in place of the username and password
     * The access_token experation date is based on the company_config session_timeout which is comany specific
     */
    public function store(Request $request,int $company_id)
    {
        $program_session = app()->make('Program_Session_Username');
        if($program_session instanceof Response){return $program_session;}
        return Response_201([
            'Program_Session' => $program_session->Get_API_Response_Collection()
        ],$request);
    }
}
