<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1/{company}',  'middleware' => 'company'],function(){
    Route::resource('signin', 'SigninController',[
        'only' => ['store'],
        'names' => ['store' => 'User_Signin']
    ])->middleware('secret');
    Route::resource('user', 'UserController',[
        'only' => ['store'],
        'names' => [
            'store' => 'Create_User'
            ]
    ]);
    Route::resource('users', 'UsersController',[
        'only' => ['index','update','destroy'],
        'names' => [
            'index' => 'List_Users',
            'update' => 'Update_User',
            'destroy' => 'Delete_User']
        ]);
});
Route::group(['prefix' => 'v1',  'middleware' => 'secret'],function(){
    Route::resource('/company', 'CompanyController',[
        'only' => ['store'],
        'names' => ['store' => 'Create_Company']
    ]);
    Route::resource('/companies', 'CompanyController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Companies']
    ]);
    Route::resource('/routes', 'RouteController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Routes']
    ]);
});
Route::get('{any}', function ($any = null) {
    return response()->json([
        'message' => 'Not a valid endpoint'
    ],404);
})->where('any', '.*');
