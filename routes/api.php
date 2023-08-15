<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('apartments', [ApartmentController::class, 'index']);
    Route::get('apartments/{id}', [ApartmentController::class, 'show']);
    Route::post('apartments', [ApartmentController::class, 'store']);
    Route::put('apartments/{id}', [ApartmentController::class, 'update']);
    Route::delete('apartments/{id}', [ApartmentController::class, 'destroy']);
});

Route::post('login', [UserController::class, 'login']);