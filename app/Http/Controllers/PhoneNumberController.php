<?php

namespace App\Http\Controllers;

use app\Helpers\Phone_Number_Type;
use Illuminate\Http\Request;
/**
 * @group Universal Objects
 */
class PhoneNumberController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {PUT} {phonenumber}/phonenumbers/v1/api
     */
    public function update(Request $request, $id)
    {
        $update = false;
        if(app()->request->input('description',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Description(app()->request->input('description'));
        }
        if(app()->request->input('area_code',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Area_Code(app()->request->input('area_code'),false);
            $update = true;
        }
        if(app()->request->input('prefix',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Prefix(app()->request->input('prefix'),false);
            $update = true;
        }
        if(app()->request->input('suffix',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Suffix(app()->request->input('suffix'));
        }
        if(app()->request->input('ext',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Ext(app()->request->input('ext'));
        }
        if(app()->request->input('country_code',false))
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Set_Phone_Number_Country_Code(app()->request->input('country_code'));
        }
        if($update)
        {
            $this->toolbelt->objects->Get_Phone_Number(3)->Create_Object();
        }
        return $this->toolbelt->functions->Response_201(['message' => 'Phone Number Updated',
        'Phone Number' => $this->toolbelt->objects->Get_Phone_Number(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {phonenumber}/phonenumbers/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->objects->Get_Phone_Number(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Phone Number Disabled',
            'Address' => $this->toolbelt->objects->Get_Phone_Number(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Phone Number Deleted'],app()->request);
        }
    }
}
