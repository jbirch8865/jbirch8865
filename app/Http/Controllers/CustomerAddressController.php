<?php

namespace App\Http\Controllers;

use app\Helpers\Customer;
use Illuminate\Http\Request;
/**
 * @group CDM
 */
class CustomerAddressController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {GET} customer_addresses/{customer}/customers/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Use_Tables()->Get_Customer_Has_Addresses()->Get_All_Objects('Customer_Address',$request,$this->toolbelt->Use_Tables()->Get_Customer_Has_Addresses()->Get_Column('address_id'));
    }
    /**
     * {POST} customer_addresses/{customer}/customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Description(app()->request->input('description'),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_City(app()->request->input('city'),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_State(app()->request->input('state'),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Name(app()->request->input('name',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Street1(app()->request->input('street1',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Street2(app()->request->input('street2',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Zip(app()->request->input('zip',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Lat(app()->request->input('lat',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_Lng(app()->request->input('lng',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Address_URL(app()->request->input('url',''),false);
        $this->toolbelt->Use_Objects()->Get_Customer_Address()->Set_Google_ID(app()->request->input('google_id',''));
        global $documentation_customer_address_id_to_delete;
        $documentation_customer_address_id_to_delete = $this->toolbelt->Use_Objects()->Get_Customer_Address()->Get_Verified_ID();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Address Created',
        'Customer_Address' => $this->toolbelt->Use_Objects()->Get_Customer_Address()->Get_API_Response_Collection()],$request);
    }

}
