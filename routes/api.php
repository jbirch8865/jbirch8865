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
Route::prefix('v1/{company}')->group(function(){
    Route::resource('signin', 'SigninController',[
        'only' => ['store'],
        'names' => ['store' => 'User_Signin']
    ]);
    Route::resource('Users', 'UsersController',[
        'only' => ['index'],
        'names' => ['index' => 'List_Users']
        ]);
});




Route::get('{any}', function ($any = null) {
    return response()->json([
        'message' => 'Not a valid endpoint'
    ],404);
})->where('any', '.*');
