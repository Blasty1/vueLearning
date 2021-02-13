<?php

use App\Http\Controllers\Api\MessageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user/users','Api\UserController@index');
Route::middleware('auth:api')->get('/user/messages/{idUser}',[MessageController::class,'index']);
Route::middleware('auth:api')->get('/user/message/new',[MessageController::class,'store']);


