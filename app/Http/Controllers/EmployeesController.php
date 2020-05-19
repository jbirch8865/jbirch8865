<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group CDM
 */
class EmployeesController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {GET} employees/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->object->Get_People_Belong_To_Company()->Get_All_Objects('Employee',$request,$this->toolbelt->object->Get_People_Belong_To_Company()->Get_Column('people_id'));
    }
    /**
     * {POST} employees/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->object->Get_Employee(2)->Set_Description(app()->request->input('description',''),true,false);
        $this->toolbelt->object->Get_Employee(2)->Set_Title(app()->request->input('title',''),true,false);
        $this->toolbelt->object->Get_Employee(2)->Set_First_Name(app()->request->input('first_name'),true,false);
        $this->toolbelt->object->Get_Employee(2)->Set_Last_Name(app()->request->input('last_name'),true,false);
        $this->toolbelt->object->Get_Employee(2)->Set_Email(app()->request->input('email',''));
        global $documentation_employee_id_to_delete;
        $documentation_employee_id_to_delete = $this->toolbelt->object->Get_Employee(2)->Get_Verified_ID();
        return $this->toolbelt->functions->Response_201(['message' => 'Employee Created',
        'Employee' => $this->toolbelt->object->Get_Employee(2)->Get_API_Response_Collection()],$request);
    }
}
