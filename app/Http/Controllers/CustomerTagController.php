<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
/**
 * @group CDM
 */
class CustomerTagController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;

    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} tags/customers/v1/api
     */
    public function index(Request $request)
    {
        return $this->toolbelt->Get_Customer_Tags()->Get_All_Objects('Tag',$request);
    }
    /**
     * {POST} tags/customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Get_Tag(2)->Set_Tag_Name(app()->request->input('tag_name'),false);
        $this->toolbelt->Get_Tag(2)->Set_Table_Name($this->toolbelt->Customers);
        return Response_201(['message' => 'Customer Tag Created',
        'Customer_Tag' => $this->toolbelt->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

}
