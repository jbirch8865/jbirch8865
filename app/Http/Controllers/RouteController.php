<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Companies;
use app\Facades\Routes;

class RouteController extends Controller
{
    private \Test_Tools\toolbelt $toolbelt;
    function __construct()
    {
        $this->toolbelt = new \Test_Tools\toolbelt;
    }
    /**
     * {GET} routes/v1/api
     * See all the endpoints and if their explicit rights
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response_200([
            'message' => 'List of Current Routes',
            'Routes' => $this->toolbelt->Get_Routes()->Get_All_Objects('Route',app()->request)
        ],app()->request);
    }
}
