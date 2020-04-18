<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Facades\Companies;
use app\Facades\Routes;

class RouteController extends Controller
{
    /**
     * {GET} routes/v1/api
     * See all the endpoints and if their explicit rights
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Routes::Query_Single_Table([],true);
        $routes = array();
        While($row = Routes::Get_Queried_Data())
        {
            $route = new \app\Helpers\Route;
            $route->Load_From_Route_ID($row['id']);
            $routes[$route->Get_Name()] = $route->Get_API_Response_Collection();
        }
        return Response_200([
            'message' => 'List of Current Routes',
            'Routes' => $routes
        ],app()->request);
    }
}
