<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class,'store']);
    Route::post('login', [UserController::class,'login']);
    Route::get('create', [UserController::class,'create']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::get('{id}/edit', [UserController::class, 'edit']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}/delete', [UserController::class, 'destroy']);
  });
  