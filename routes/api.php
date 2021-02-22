<?php

use App\Http\Controllers\Api\V1\User\AuthUserController;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Http\Controllers\Api\V1\User\UserPassword;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);

    Route::post("register", [AuthUserController::class, 'registration']);
    Route::post("login", [AuthUserController::class, 'login']);

    // sanctum auth middleware routes
    Route::middleware('auth:api')->group(function () {
        Route::get("user/{id}", [UserController::class, 'show']);

        Route::get("logout", [AuthUserController::class, 'logout']);

        Route::post("changepass", [UserPassword::class, 'changePassword']);
    });
});

Route::prefix('v2')->group(function () {
    //DO SOMETHING
});
