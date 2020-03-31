<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Company
 * Basic CRUD operations for Companies, Company Configs and Users
 */
class UsersController extends Controller
{
    /**
     * @queryParam only_active if set will only return active users Example: true
     */
    public function index(Request $request,int $company_id)
    {
        $toolbelt = new \Test_Tools\toolbelt;
        if($request->input('only_active',false))
        {
            $toolbelt->Users->Query_Single_Table(array('username','active_status'),false,"WHERE `company_id` = '".$company_id."' AND `Active_Status` = '1'");
        }else
        {
            $toolbelt->Users->Query_Single_Table(array('username','active_status'),false,"WHERE `company_id` = '".$company_id."'");
        }
        $Users = array();
        $count = 0;
        While($row = $toolbelt->Users->Get_Queried_Data())
        {
            $Users[$count]['user_name'] = $row['username'];
            $Users[$count++]['active'] = (bool) $row['active_status'];
        }
        return response()->json([
            'message' => $Users
        ],200);
    }
    /**
     * @bodyParam user_name string required
     * @bodyParam plain_text_password string required
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
            return response()->json([
                'message' => 'The Secret header with secret Secret-Token is required.'
            ],422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
