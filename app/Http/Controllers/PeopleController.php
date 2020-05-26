<?php

namespace App\Http\Controllers;

use app\Helpers\People;
use Illuminate\Http\Request;

/**
 * @group Universal Objects
 */
class PeopleController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }

    /**
     * {PUT} {people}/peoples/v1/api
     */
    public function update(Request $request, $id)
    {
        if(app()->request->input('description',false))
        {
            $this->toolbelt->Use_Objects()->Get_People(3)->Set_Description(app()->request->input('description'));
        }
        if(app()->request->input('title',false))
        {
            $this->toolbelt->Use_Objects()->Get_People(3)->Set_Title(app()->request->input('title'));
        }
        if(app()->request->input('first_name',false))
        {
            $this->toolbelt->Use_Objects()->Get_People(3)->Set_first_name(app()->request->input('first_name'));
        }
        if(app()->request->input('last_name',false))
        {
            $this->toolbelt->Use_Objects()->Get_People(3)->Set_Last_Name(app()->request->input('last_name'));
        }
        if(app()->request->input('email',false))
        {
            $this->toolbelt->Use_Objects()->Get_People(3)->Set_Email(app()->request->input('email'));
        }
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'People Updated',
        'People' => $this->toolbelt->Use_Objects()->Get_People(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {people}/peoples/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Use_Objects()->Get_People(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'People Disabled',
            'Employee' => $this->toolbelt->Use_Objects()->Get_People(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->Use_Functions()->Response_201(['message' => 'People Deleted'],app()->request);
        }
    }
}
