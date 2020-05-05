<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'],function(){

    Route::resource('{company}/signin', 'SigninController',[
        'only' => ['store'],
        'names' => ['store' => 'User_Signin']
    ])->middleware('company');


    Route::resource('users', 'UsersController',[
        'only' => ['index','store','update','destroy'],
        'names' => [
            'index' => 'List_Users',
            'store' => 'Create_User',
            'update' => 'Update_User',
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
        'only' => ['store','index'],
        'names' => [
            'store' => 'Create_Employee',
            'index' => 'List_Employees']
        ])->middleware(['company_access_token']);


    Route::resource('peoples', 'PeopleController',[
        'only' => ['update','destroy'],
        'names' => [
            'update' => 'Update_People',
            'destroy' => 'Delete_People']
        ])->middleware(['company_access_token']);



    Route::resource('credit_statuses', 'CreditStatusController',[
        'only' => ['store'],
        'names' => [
            'store' => 'Create_Credit_Status']
        ])->middleware(['company_access_token']);


    Route::resource('credit_statuses', 'CreditStatusController',[
        'only' => ['index','update'],
        'names' => [
            'index' => 'List_Credit_Statuses',
            'update' => 'Update_Credit_Status']
        ])->middleware(['company_access_token']);


    Route::resource('customers', 'CustomersController',[
        'only' => ['store'],
        'names' => [
            'store' => 'Create_Customer']
        ])->middleware(['company_access_token']);


    Route::resource('customers', 'CustomersController',[
        'only' => ['index','update'],
        'names' => [
            'index' => 'List_Customers',
            'update' => 'Update_Customer']
        ])->middleware(['company_access_token']);

    Route::resource('equipment', 'EquipmentController',[
        'only' => ['store'],
        'names' => [
            'store' => 'Create_Equipment']
        ])->middleware(['company_access_token']);


    Route::resource('equipment', 'EquipmentController',[
        'only' => ['index','update','destroy'],
        'names' => [
            'index' => 'List_Equipment',
            'update' => 'Update_Equipment',
            'destroy' => 'Delete_Equipment']
        ])->middleware(['company_access_token']);

    Route::resource('/customers/{customer}/customer_addresses', 'CustomerAddressController',[
        'only' => ['store','index'],
        'names' => [
            'index' => 'List_Customer_Addresses',
            'store' => 'Create_Customer_Address']
        ])->middleware(['company_access_token']);


    Route::resource('addresses', 'AddressController',[
        'only' => ['update','destroy'],
        'names' => [
            'update' => 'Update_Address',
            'destroy' => 'Delete_Address']
        ])->middleware(['company_access_token']);


    Route::resource('customers', 'CustomersController',[
        'only' => ['destroy'],
        'names' => [
            'destroy' => 'Delete_Customer']
        ])->middleware(['company_access_token']);

    Route::resource('credit_statuses', 'CreditStatusController',[
        'only' => ['destroy'],
        'names' => [
            'destroy' => 'Delete_Credit_Status']
        ])->middleware(['company_access_token']);

    Route::resource('/companies', 'CompanyController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Companies']
        ]);


    Route::resource('/companies', 'CompanyController',[
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

    Route::resource('companies', 'CompanyController',[
        'only' => ['destroy'],
        'names' => ['destroy' => 'Delete_Company']
    ]);
    Route::resource('companies/{company}/signin', 'SigninController',[
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
