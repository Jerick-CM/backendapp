<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


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

Route::post('/logout', function (Request $request) {
    $time_start = microtime(true);

    auth()->guard('web')->logout();
    $request->session()->invalidate();
    $time_end = microtime(true);
    $timeend = $time_end - $time_start;

    return response()->json([
        'success' => true,
        '_elapsed_time' => $timeend,
    ], 200);
});

Route::post('/register', [RegisterController::class, 'register']);

Route::group(['prefix' => 'user', 'middleware' => 'throttle:500,1'], function () {

    Route::post('/user_datatable', [UserController::class, 'user_datatable']);

    Route::post('/datatable', [UserController::class, 'datatable']);

    Route::delete('/delete/{id}', [UserController::class, 'delete']);

    Route::post('/resetpassword/{id}', [UserController::class, 'resetpassword']);

    Route::post('/changestatus/{id}', [UserController::class, 'changestatus']);

    Route::post('/changepassword/{id}', [UserController::class, 'changepassword']);

    Route::post('/update_username/{id}', [UserController::class, 'update_name']);

});

Route::group(['prefix' => 'role', 'middleware' => 'throttle:500,1'], function () {

    Route::get('/data', [RoleController::class, 'get_roles']);
    Route::post('/update_role/{id}', [RoleController::class, 'update_role']);

});
