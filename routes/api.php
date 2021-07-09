<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ContactController;

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

//Shippers
Route::group(['prefix'=>'shippers'], function(){
    Route::get('/get',     [ShipperController::class, 'show']);
    Route::post('/store',  [ShipperController::class, 'store']);
    Route::post('/update', [ShipperController::class, 'update']);
});

//Contacts
Route::group(['prefix'=>'contacts'], function(){
    Route::get('/get',     [ContactController::class, 'show']);
    Route::post('/store',  [ContactController::class, 'store']);
});
