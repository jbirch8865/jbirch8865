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
        return $this->toolbelt->Use_Tables()->Get_Tags_Have_Roles($this->toolbelt->Use_Objects()->Get_Tag(3))->Get_All_Objects('Tag',$request,$this->toolbelt->Use_Tables()->Tags_Have_Roles->Get_Column('tag_id'));
    }

    /**
     * {POST} roles/{tag}/tags/v1/api
     */
    public function store(Request $request)
    {
        return $this->toolbelt->Use_Functions()->Response_201([
            'message' => 'Role added to Tag',
            'Tags_Have_Role' => $this->toolbelt->Use_Objects()->Get_Tags_Have_Role(2)->Get_API_Response_Collection()
        ],$request);
    }
    /**
     * {DELETE} {role}/roles/{tag}/tags/v1/api
     */
    public function destroy(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Tags_Have_Role(1)->Delete_Active_Record();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Role Removed From Tag'],app()->request);
    }

}
