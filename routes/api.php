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
Route::prefix('v1/{company_id}')->group(function(){
    Route::resource('signin', 'SigninController',[
        'only' => ['store'],
        'names' => ['store' => 'User_Signin']
    ])->middleware('secret');
    Route::resource('Users', 'UsersController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Users']
        ]);
    Route::resource('User', 'UserController',[
        'only' => ['store'],
        'names' => ['store' => 'Create_User']
    ]);
});
Route::prefix('v1')->group(function(){
    Route::resource('/Company', 'CompanyController',[
        'only' => ['store'],
        'names' => ['store' => 'Create_Company']
    ])->middleware('secret');
    Route::resource('/Companies', 'CompanyController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Companies']
    ])->middleware('secret');
    
});
Route::get('{any}', function ($any = null) {
    return response()->json([
        'message' => 'Not a valid endpoint'
    ],404);
})->where('any', '.*');
