<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'],function(){

    Route::resource('{company}/signin', 'SigninController',[
        'only' => ['store'],
        'names' => ['store' => 'User_Signin']
    ])->middleware('company');


    Route::resource('users', 'UsersController',[
        'only' => ['index','store','update'],
        'names' => [
            'index' => 'List_Users',
            'store' => 'Create_User',
            'update' => 'Update_User']
        ])->middleware('company_access_token');


    Route::resource('users', 'UsersController',[
            'only' => ['destroy'],
            'names' => [
                'destroy' => 'Delete_User']
            ])->middleware('company_access_token');


    Route::resource('roles', 'CompanyRole',[
        'only' => ['index','store','update','destroy'],
        'names' => [
            'index' => 'List_Roles',
            'store' => 'Create_Role',
            'destroy' => 'Delete_Role',
            'update' => 'Edit_Role'
            ]
    ])->middleware('company_access_token');


    Route::resource('employees', 'EmployeesController',[
        'only' => ['store'],
        'names' => [
            'store' => 'Create_Employee']
        ])->middleware(['company_access_token','object_validate_relations']);


    Route::resource('employees', 'EmployeesController',[
        'only' => ['index','update','destroy'],
        'names' => [
            'index' => 'List_Employees',
            'update' => 'Update_Employee',
            'destroy' => 'Delete_Employee']
        ])->middleware(['company_access_token','object_validate_relations']);


    Route::resource('/companies', 'CompanyController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Companies']
    ]);


    Route::resource('/company', 'CompanyController',[
        'only' => ['store'],
        'names' => ['store' => 'Create_Company']
    ]);


    Route::resource('/routes', 'RouteController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Routes']
    ]);


    Route::resource('/{company}/default_user', 'UserController',[
        'only' => ['update'],
        'names' => ['update' => 'Enable_Default_User']
    ])->middleware('company');


    Route::resource('{company}/signin', 'SigninController',[
        'only' => ['destroy'],
        'names' => ['destroy' => 'User_Signout']
    ])->middleware('company');
});

Route::get('{any}', function ($any = null) {
    return response()->json([
        'message' => 'Not a valid endpoint'
    ],404);
})->where('any', '.*');
?>
