<?php

namespace App\Http\Controllers;

use app\Helpers\Credit_Status;
use app\Helpers\Customer;
use App\Rules\Does_This_Exist_In_Context;
use Illuminate\Http\Request;
/**
 * @group CDM
 */

class CustomersController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} customers/v1/api
     */
    public function index()
    {
        return $this->toolbelt->Use_Tables()->Get_Customers()->Get_All_Objects('Customer',app()->request);
    }
    /**
     * {POST} customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Customer(2)->Set_Company($this->toolbelt->Use_Objects()->Get_Company(),false);
        $this->toolbelt->Use_Objects()->Get_Customer(2)->Set_Customer_Name($request->input('customer_name'),true,false);
        $this->toolbelt->Use_Objects()->Get_Customer(2)->Set_Website($request->input('website',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer(2)->Set_CCB($request->input('ccb',''),true);
        global $documentation_customer_id_to_delete;
        $documentation_customer_id_to_delete = $this->toolbelt->Use_Objects()->Get_Customer(2)->Get_Verified_ID();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Created',
        'Customer' => $this->toolbelt->Use_Objects()->Get_Customer(2)->Get_API_Response_Collection()],$request);
    }
    /**
     * {PUT} {customer}/customers/v1/api
     */
    public function update(Request $request, $id)
    {
        $this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id')->Set_Field_Value($id);
        $this->toolbelt->Use_Functions()->Enable_Disabled_Object($this->toolbelt->Use_Tables()->Get_Customers()->Get_Column('id'),new Customer);
        if(app()->request->input('customer_name',false))
        {
            $this->toolbelt->Use_Objects()->Get_Customer(3)->Set_Customer_Name(app()->request->input('customer_name'));
        }
        if(app()->request->input('website',false))
        {
            $this->toolbelt->Use_Objects()->Get_Customer(3)->Set_Website(app()->request->input('website'));
        }
        if(app()->request->input('ccb',false))
        {
            $this->toolbelt->Use_Objects()->Get_Customer(3)->Set_CCB(app()->request->input('ccb'));
        }
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Updated',
        'Customer' => $this->toolbelt->Use_Objects()->Get_Customer(3)->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {customer}/customers/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Use_Objects()->Get_Customer(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Disabled',
            'Customer' => $this->toolbelt->Use_Objects()->Get_Customer(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Deleted'],app()->request);
        }
    }
}
