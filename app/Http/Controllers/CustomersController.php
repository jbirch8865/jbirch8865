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
        return $this->toolbelt->tables->Get_Customers()->Get_All_Objects('Customer',app()->request);
    }
    /**
     * {POST} customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->objects->Get_Customer(2)->Set_Company($this->toolbelt->objects->Get_Company(),false);
        $this->toolbelt->objects->Get_Customer(2)->Set_Customer_Name($request->input('customer_name'),true,false);
        $credit_status = new Credit_Status;
        $credit_status->Load_Object_By_ID(app()->request->input('credit_status'));
        $this->toolbelt->objects->Get_Customer(2)->Set_Credit_Status($credit_status,false);
        $this->toolbelt->objects->Get_Customer(2)->Set_Website($request->input('website',''),false);
        $this->toolbelt->objects->Get_Customer(2)->Set_CCB($request->input('ccb',''),true);
        global $documentation_customer_id_to_delete;
        $documentation_customer_id_to_delete = $this->toolbelt->objects->Get_Customer(2)->Get_Verified_ID();
        return $this->toolbelt->functions->Response_201(['message' => 'Customer Created',
        'Customer' => $this->toolbelt->objects->Get_Customer(2)->Get_API_Response_Collection()],$request);
    }
    /**
     * {PUT} {customer}/customers/v1/api
     */
    public function update(Request $request, $id)
    {
        $this->toolbelt->tables->Get_Customers()->Get_Column('id')->Set_Field_Value($id);
        $this->toolbelt->functions->Enable_Disabled_Object($this->toolbelt->tables->Get_Customers()->Get_Column('id'),new Customer);
        if(app()->request->input('customer_name',false))
        {
            $this->toolbelt->objects->Get_Customer(3)->Set_Customer_Name(app()->request->input('customer_name'));
        }
        if(app()->request->input('credit_status',false))
        {
            $credit_status = new Credit_Status;
            $credit_status->Load_Object_By_ID(app()->request->input('credit_status'));
            $this->toolbelt->objects->Get_Customer(3)->Set_Credit_Status($credit_status);
        }
        if(app()->request->input('website',false))
        {
            $this->toolbelt->objects->Get_Customer(3)->Set_Website(app()->request->input('website'));
        }
        if(app()->request->input('ccb',false))
        {
            $this->toolbelt->objects->Get_Customer(3)->Set_CCB(app()->request->input('ccb'));
        }
        return $this->toolbelt->functions->Response_201(['message' => 'Customer Updated',
        'Customer' => $this->toolbelt->objects->Get_Customer(3)->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {customer}/customers/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->objects->Get_Customer(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Customer Disabled',
            'Customer' => $this->toolbelt->objects->Get_Customer(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Customer Deleted'],app()->request);
        }
    }
}
