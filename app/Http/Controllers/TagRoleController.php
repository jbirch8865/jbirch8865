<?php

namespace App\Http\Controllers;

use app\Helpers\Tag;
use Illuminate\Http\Request;
/**
 * @group Universal Objects
 */
class TagRoleController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} roles/{tag}/tags/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Get_Tags_Have_Roles()->Get_All_Objects('Tag',$request,$this->toolbelt->Tags_Have_Roles->Get_Column('tag_id'));
    }

    /**
     * {POST} roles/{tag}/tags/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Get_Tags_Have_Role(2)->Set_Role($request->input('role'),$request->input('get',false),$request->input('post',false),$request->input('destroy',false),false);
        $tag = new Tag;
        $tag->Load_Object_By_ID(app()->request->tag);
        $this->toolbelt->Get_Tags_Have_Role(2)->Set_Tag($tag);
        return Response_201([
            'message' => 'Role added to Tag',
            'Tags_Have_Role' => $this->toolbelt->Get_Tags_Have_Role(2)->Get_API_Response_Collection()
        ],$request);
    }
    /**
     * {DELETE} {role}/roles/{tag}/tags/v1/api
     */
    public function destroy(Request $request)
    {
        $this->toolbelt->Get_Tags_Have_Role(1)->Delete_Active_Record();
        return Response_201(['message' => 'Role Removed From Tag'],app()->request);
    }

}
