<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Universal Objects
 */
class AddressController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {PUT} {address}/addresses/v1/api
     */
    public function update(Request $request, $id)
    {
        if(app()->request->input('description',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Description(app()->request->input('description'));
        }
        if(app()->request->input('name',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Name(app()->request->input('name'));
        }
        if(app()->request->input('street1',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Street1(app()->request->input('street1'));
        }
        if(app()->request->input('street2',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Street2(app()->request->input('street2'));
        }
        if(app()->request->input('city',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_City(app()->request->input('city'));
        }
        if(app()->request->input('state',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_State(app()->request->input('state'));
        }
        if(app()->request->input('zip',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Zip(app()->request->input('zip'));
        }
        if(app()->request->input('lat',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Lat(app()->request->input('lat'));
        }
        if(app()->request->input('lng',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_Lng(app()->request->input('lng'));
        }
        if(app()->request->input('url',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Address_URL(app()->request->input('url'));
        }
        if(app()->request->input('google_id',false))
        {
            $this->toolbelt->Use_Objects()->Get_Address(3)->Set_Google_ID(app()->request->input('google_id'));
        }
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Address Updated',
        'Address' => $this->toolbelt->Use_Objects()->Get_Address(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {address}/addresses/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Use_Objects()->Get_Address(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Address Disabled',
            'Address' => $this->toolbelt->Use_Objects()->Get_Address(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Address Deleted'],app()->request);
        }
    }
}
