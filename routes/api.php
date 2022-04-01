<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', LoginController::class);

Route::post('/login', LoginController::class);

Route::post('/register', [RegisterController::class, 'register']);


Route::group(['prefix' => 'user','middleware' => 'throttle:500,1'], function () {


    Route::post('/datatable', [UserController::class, 'datatable']);

});
