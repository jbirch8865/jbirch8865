<?php

namespace App\Http\Controllers;

use app\Helpers\Credit_Status;
use Illuminate\Http\Request;
/**
 * @group CDM
 */
class CreditStatusController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} creditstatuses/v1/api
     */
    public function index()
    {
        return $this->toolbelt->Use_Tables()->Get_Credit_Statuses()->Get_All_Objects('Credit_Status',app()->request);
    }
    /**
     * {POST} creditstatuses/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Credit_Status(2)->Set_Company($this->toolbelt->Use_Objects()->Get_Company(),false);
        $this->toolbelt->Use_Objects()->Get_Credit_Status(2)->Set_Credit_Status(app()->request->input('name'));
        global $documentation_credit_status_id_to_delete;
        $documentation_credit_status_id_to_delete = $this->toolbelt->Use_Objects()->Get_Credit_Status(2)->Get_Verified_ID();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Credit_Status Created',
        'Credit_Status' => $this->toolbelt->Use_Objects()->Get_Credit_Status(2)->Get_API_Response_Collection()],$request);
    }
    /**
     * {PUT} {creditstatus}/credit_statuses/v1/api
     */
    public function update(Request $request, $id)
    {
        if(app()->request->input('name',false))
        {
            $this->toolbelt->Use_Objects()->Get_Credit_Status(3)->Set_Credit_Status(app()->request->input('name'));
        }
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Credit Status Updated',
        'Credit_Status' => $this->toolbelt->Use_Objects()->Get_Credit_Status(3)->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {creditstatus}/credit_statuses/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Use_Objects()->Get_Credit_Status(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Credit_Status Disabled',
            'Credit_Status' => $this->toolbelt->Use_Objects()->Get_Credit_Status(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Credit_Status Deleted'],app()->request);
        }
    }

}
