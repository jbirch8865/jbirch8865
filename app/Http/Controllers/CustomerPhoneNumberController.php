<?php

namespace App\Http\Controllers;

use app\Helpers\Phone_Number_Type;
use Illuminate\Http\Request;
/**
 * @group CDM
 */
class CustomerPhoneNumberController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {GET} phonenumbers/{customer}/customers/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Get_Customer_Has_Phone_Numbers()->Get_All_Objects('Customer_Phone_Number',$request,$this->toolbelt->Get_Customer_Has_Phone_Numbers()->Get_Column('phone_number_id'));
    }
    /**
     * {POST} phonenumbers/{customer}/customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Description(app()->request->input('description'),false);
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Area_Code(app()->request->input('area_code'),false);
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Prefix(app()->request->input('prefix'),false);
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Suffix(app()->request->input('suffix'),false);
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Ext(app()->request->input('ext',''),false);
        $this->toolbelt->Get_Customer_Phone_Number()->Set_Phone_Number_Country_Code(app()->request->input('country_code','1'),true);
        global $documentation_customer_phone_number_id_to_delete;
        $documentation_customer_phone_number_id_to_delete = $this->toolbelt->Get_Customer_Phone_Number()->Get_Verified_ID();
        return Response_201(['message' => 'Customer Phone Number Created',
        'Customer_Phone_Number' => $this->toolbelt->Get_Customer_Phone_Number()->Get_API_Response_Collection()],$request);
    }

}
