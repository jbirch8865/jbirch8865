<?php

namespace App\Http\Controllers;

use app\Helpers\Customer;
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
     * {GET} addtags/customers/v1/api
     */
    public function index(Request $request)
    {
        $active_record = new Customer;
        return $this->toolbelt->tables->Get_Object_Tags($active_record)->Get_All_Objects('Tag',$request);
    }
    /**
     * {POST} addtags/customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->objects->Get_Tag(2)->Set_Tag_Name(app()->request->input('tag_name'),false);
        $this->toolbelt->objects->Get_Tag(2)->Set_Table_Name($this->toolbelt->tables->Customers);
        global $documentation_customer_tag_id_to_delete;
        $documentation_customer_tag_id_to_delete = $this->toolbelt->objects->Get_Tag(2)->Get_Verified_ID();
        return $this->toolbelt->functions->Response_201(['message' => 'Customer Tag Created',
        'Customer_Tag' => $this->toolbelt->objects->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

}
