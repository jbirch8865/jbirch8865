<?php

namespace App\Http\Controllers;

use app\Helpers\Tag;
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
        $tag = new Tag;
        return $this->toolbelt->tables->Get_Object_Tags($tag)->Get_All_Objects('Tag',$request);
    }
    /**
     * {POST} addtags/tags/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->objects->Get_Tag(2)->Set_Tag_Name(app()->request->input('tag_name'),false);
        $this->toolbelt->objects->Get_Tag(2)->Set_Table_Name($this->toolbelt->tables->Tags);
        global $documentation_tag_tag_id_to_delete;
        $documentation_tag_tag_id_to_delete = $this->toolbelt->objects->Get_Tag(2)->Get_Verified_ID();
        return $this->toolbelt->functions->Response_201(['message' => 'Tag Tag Created',
        'Tag_Tag' => $this->toolbelt->objects->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

    /**
     * {PUT} {tag}/tags/v1/api
     */
    public function update(Request $request, $id)
    {
        if(app()->request->input('tag_name',false))
        {
            $this->toolbelt->objects->Get_Tag(3)->Set_Tag_Name(app()->request->input('tag_name'));
        }
        return $this->toolbelt->functions->Response_201(['message' => 'Tag Updated',
        'Tag' => $this->toolbelt->objects->Get_Tag(3)->Get_API_Response_Collection()],$request);
    }

    /**
     * {DELETE} {tag}/tags/v1/api
     */
    public function destroy($id)
    {
        $this->toolbelt->objects->Get_Tag(1)->Delete_Active_Record();
        if(app()->request->input('active_status'))
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Tag Disabled',
            'Tag' => $this->toolbelt->objects->Get_Tag(1)->Get_API_Response_Collection()],app()->request);
        }else
        {
            return $this->toolbelt->functions->Response_201(['message' => 'Tag Deleted'],app()->request);
        }
    }
}
