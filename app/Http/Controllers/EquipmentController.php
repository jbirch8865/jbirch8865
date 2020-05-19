<?php

namespace App\Http\Controllers;

use app\Helpers\Equipment;
use Illuminate\Http\Request;
/**
 * @group CDM
 */
class EquipmentController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} equipment/v1/api
     */
    public function index()
    {
        return $this->toolbelt->tables->Get_Equipments()->Get_All_Objects('Equipment',app()->request);
    }
    /**
     * {POST} equipment/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->object->Get_Equipment(2);
        $this->toolbelt->object->Get_Equipment(2)->Set_Company($this->toolbelt->object->Get_Company(),false);
        $this->toolbelt->object->Get_Equipment(2)->Set_Equipment_Name(app()->request->input('equipment_name'));
        global $documentation_equipment_id_to_delete;
        $documentation_equipment_id_to_delete = $this->toolbelt->object->Get_Equipment(2)->Get_Verified_ID();
        return $this->toolbelt->functions->Response_201(['message' => 'Equipment Created',
        'Equipment' => $this->toolbelt->object->Get_Equipment(2)->Get_API_Response_Collection()],$request);
    }
    /**
     * {PUT} {equipment}/equipment/v1/api
     */
    public function update(Request $request, $id)
    {
        $this->toolbelt->object->Get_Equipments()->Get_Column('id')->Set_Field_Value($id);
        $this->toolbelt->functions->Enable_Disabled_Object($this->toolbelt->tables->Get_Equipments()->Get_Column('id'),new Equipment);
        $this->toolbelt->object->Get_Equipment(3);
        if(app()->request->input('equipment_name',false))
        {
            $this->toolbelt->object->Get_Equipment(3)->Set_Equipment_Name(app()->request->input('equipment_name'));
        }
        return $this->toolbelt->functions->Response_201(['message' => 'Equipment Updated',
        'Equipment' => $this->toolbelt->object->Get_Equipment(3)->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {equipment}/equipment/v1/api
     */
    public function destroy($id)
    {
    //    $this->toolbelt->Get_Equipment(1);
        $this->toolbelt->object->Get_Equipment(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Equipment Disabled',
            'Equipment' => $this->toolbelt->object->Get_Equipment(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Equipment Deleted'],app()->request);
        }
    }
}
