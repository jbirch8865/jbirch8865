<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Universal Objects
 */

class TagController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} addtags/tags/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Get_Object_Tags($this->toolbelt->Get_Tags())->Get_All_Objects('Tag',$request);
    }
    /**
     * {POST} addtags/tags/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Get_Tag(2)->Set_Tag_Name(app()->request->input('tag_name'));
        $this->toolbelt->Get_Tag(2)->Set_Table_Name($this->toolbelt->Tags);
        return Response_201(['message' => 'Customer Tag Created',
        'Customer_Tag' => $this->toolbelt->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

    /**
     * {PUT} {tag}/tags/v1/api
     */
    public function update(Request $request, $id)
    {
        if(app()->request->input('tag_name',false))
        {
            $this->toolbelt->Get_Tag(3)->Set_Tag_Name(app()->request->input('tag_name'));
        }
        return Response_201(['message' => 'Tag Updated',
        'Tag' => $this->toolbelt->Get_Tag(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {tag}/tags/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->Get_Tag(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return Response_201(['message' => 'Tag Disabled',
            'Tag' => $this->toolbelt->Get_Tag(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return Response_201(['message' => 'Tag Deleted'],app()->request);
        }
    }
}
