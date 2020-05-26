<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Universal Objects
 */
class AddTagToTagController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} addtags/{tag}/tags/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Use_Tables()->Get_Object_Has_Tags($this->toolbelt->Use_Objects()->Get_Tag(3))->Get_All_Objects('Tag',$request,$this->toolbelt->Use_Tables()->Object_Has_Tags->Get_Column('tag_id'));
    }
    /**
     * {POST} addtags/{tag}/tags/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Tag(3)->Add_Tag_As_User($this->toolbelt->Use_Objects()->Get_Add_Tag(2,true,$this->toolbelt->Use_Objects()->Get_Tag(3)));
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Tag Added To Tag',
        'Tag' => $this->toolbelt->Use_Objects()->Get_Tag(3)->Get_API_Response_Collection()],$request);
    }
    /**
     * {DELETE} {addtag}/addtags/{tag}/tags/v1/api
     */
    public function destroy(Request $request)
    {
        $this->toolbelt->Use_Tables()->Get_Object_Has_Tags($this->toolbelt->Use_Objects()->Get_Tag(3))->Query_Table(['`Object_Has_Tags`.`id`'],true);
        $this->toolbelt->Use_Objects()->Get_Tag(3)->Remove_Tag_As_User($this->toolbelt->Use_Objects()->Get_Add_Tag(1,true,$this->toolbelt->Use_Objects()->Get_Tag(3)));
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Tag Removed From Tag',
        'Tag' => $this->toolbelt->Use_Objects()->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

}
