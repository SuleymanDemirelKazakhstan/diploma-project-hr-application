<?php

use App\Http\Controllers\AuthController;
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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
//    Route::get('user', [AuthController::class, 'user']);
    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index']);
    Route::get('departments/{department}', [\App\Http\Controllers\DepartmentController::class, 'show']);
    Route::put('departments/{department}', [\App\Http\Controllers\DepartmentController::class, 'update']);
    Route::delete('departments/{department}', [\App\Http\Controllers\DepartmentController::class, 'destroy']);
});
