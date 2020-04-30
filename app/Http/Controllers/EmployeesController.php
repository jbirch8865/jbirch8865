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
        return $this->toolbelt->People->Get_All_Objects('Employee',$request);
    }
    /**
     * {POST} employees/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Get_Employee(2)->Set_Description(app()->request->input('description',''),true,false);
        $this->toolbelt->Get_Employee(2)->Set_Title(app()->request->input('title',''),true,false);
        $this->toolbelt->Get_Employee(2)->Set_First_Name(app()->request->input('first_name'),true,false);
        $this->toolbelt->Get_Employee(2)->Set_Last_Name(app()->request->input('last_name'),true,false);
        $this->toolbelt->Get_Employee(2)->Set_Email(app()->request->input('email',''));
        global $documentation_employee_id_to_delete;
        $documentation_employee_id_to_delete = $this->toolbelt->Get_Employee(2)->Get_Verified_ID();
        return Response_201(['message' => 'Employee Created',
        'Employee' => $this->toolbelt->Get_Employee(2)->Get_API_Response_Collection()],$request);
    }
    /**
     * {PUT} employees/v1/api
     */
    public function update(Request $request, $id)
    {
        $this->toolbelt->Get_Employee(3);
        if(app()->request->input('description',false))
        {
            $this->toolbelt->Get_Employee(3)->Set_Description(app()->request->input('description'));
        }
        if(app()->request->input('title',false))
        {
            $this->toolbelt->Get_Employee(3)->Set_Title(app()->request->input('title'));
        }
        if(app()->request->input('Set_First_Name',false))
        {
            $this->toolbelt->Get_Employee(3)->Set_first_name(app()->request->input('first_name'));
        }
        if(app()->request->input('last_name',false))
        {
            $this->toolbelt->Get_Employee(3)->Set_Last_Name(app()->request->input('last_name'));
        }
        if(app()->request->input('email',false))
        {
            $this->toolbelt->Get_Employee(3)->Set_Email(app()->request->input('email'));
        }
        return Response_201(['message' => 'Employee Updated',
        'Employee' => $this->toolbelt->Get_Employee(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {employee}/employees/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Get_Employee(3);
        $this->toolbelt->Get_Employee(3)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return Response_201(['message' => 'Employee Disabled',
            'Employee' => $this->toolbelt->Get_Employee(3)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return Response_201(['message' => 'Employee Deleted'],app()->request);
        }
    }
}
