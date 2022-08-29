<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServicePro vider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::group( [ 'prefix' => 'auth' ], function () {
//    Route::post( '/register', [ RegisterController::class, 'create' ] );
//    Route::post( '/login', [ LoginController::class, 'login' ] );
//} );

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware' => 'api', ], function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::post( 'shipments', [ShipmentController::class ,'store']);
Route::get( 'shipments', [ShipmentController::class,'index'] );
Route::put( 'shipments/{id}', [ShipmentController::class,'update'] );
Route::get( 'shipments/{id}', [ShipmentController::class,'show'] );
Route::delete( 'shipments/{id}', [ShipmentController::class,'cancel'] );
