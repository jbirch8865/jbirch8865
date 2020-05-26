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
        return $this->toolbelt->Use_Tables()->Get_Object_Tags($active_record)->Get_All_Objects('Tag',$request);
    }
    /**
     * {POST} addtags/customers/v1/api
     */
    public function store(Request $request)
    {
        $this->toolbelt->Use_Objects()->Get_Tag(2)->Set_Tag_Name(app()->request->input('tag_name'),false);
        $this->toolbelt->Use_Objects()->Get_Tag(2)->Set_Table_Name($this->toolbelt->Use_Tables()->Customers);
        global $documentation_customer_tag_id_to_delete;
        $documentation_customer_tag_id_to_delete = $this->toolbelt->Use_Objects()->Get_Tag(2)->Get_Verified_ID();
        return $this->toolbelt->Use_Functions()->Response_201(['message' => 'Customer Tag Created',
        'Customer_Tag' => $this->toolbelt->Use_Objects()->Get_Tag(2)->Get_API_Response_Collection()],$request);
    }

}
