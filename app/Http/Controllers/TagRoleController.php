<?php

namespace App\Http\Controllers;

use app\Helpers\Company_Role;
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
        return $this->toolbelt->tables->Get_Tags_Have_Roles($this->toolbelt->objects->Get_Tag(3))->Get_All_Objects('Tag',$request,$this->toolbelt->tables->Tags_Have_Roles->Get_Column('tag_id'));
    }

    /**
     * {POST} roles/{tag}/tags/v1/api
     */
    public function store(Request $request)
    {
        $role = new Company_Role;
        $role->Load_Object_By_ID($request->input('role'));
        $this->toolbelt->objects->Get_Tags_Have_Role(2)->Set_Role($role,$request->input('get',false),$request->input('post',false),$request->input('destroy',false),false);
        $tag = new Tag;
        $tag->Load_Object_By_ID(app()->request->tag);
        $this->toolbelt->objects->Get_Tags_Have_Role(2)->Set_Tag($tag);
        return $this->toolbelt->functions->Response_201([
            'message' => 'Role added to Tag',
            'Tags_Have_Role' => $this->toolbelt->objects->Get_Tags_Have_Role(2)->Get_API_Response_Collection()
        ],$request);
    }
    /**
     * {DELETE} {role}/roles/{tag}/tags/v1/api
     */
    public function destroy(Request $request)
    {
        $this->toolbelt->objects->Get_Tags_Have_Role(1)->Delete_Active_Record();
        return $this->toolbelt->functions->Response_201(['message' => 'Role Removed From Tag'],app()->request);
    }

}
