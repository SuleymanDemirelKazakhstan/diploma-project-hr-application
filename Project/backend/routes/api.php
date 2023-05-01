<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\PositionController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\AttendanceController;
use \App\Http\Controllers\HolidayController;
use \App\Http\Controllers\LeaveTypeController;
use \App\Http\Controllers\LeaveController;

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
    // <-----DEPARTMENTS----->
    Route::get('departments', [DepartmentController::class, 'index']);
    Route::get('departments/{department}', [DepartmentController::class, 'show']);
    Route::put('departments/{department}', [DepartmentController::class, 'update']);
    Route::delete('departments/{department}', [DepartmentController::class, 'destroy']);

    // <-----POSITIONS----->
    Route::get('positions', [PositionController::class, 'index']);
    Route::get('positions/{position}', [PositionController::class, 'show']);

    // <-----EMPLOYEES----->
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::post('employees', [EmployeeController::class, 'store']);
    Route::get('employees/{employee}', [EmployeeController::class, 'show']);
    Route::get('employees/{employee}/attendance', [AttendanceController::class, 'show']);
    Route::post('employees/{employee}/attendance', [AttendanceController::class, 'store']);
    Route::get('employees/{employee}/leaves', [LeaveController::class, 'employeeLeaves']);
    Route::post('employees/{employee}/leaves', [LeaveController::class, 'store']);
    Route::put('employees/{employee}', [EmployeeController::class, 'update']);
    Route::delete('employees/{employee}', [EmployeeController::class, 'destroy']);

    // <-----ATTENDANCE----->
    Route::get('attendances', [AttendanceController::class, 'index']);


    // <-----HOLIDAY----->
    Route::get('holidays', [HolidayController::class, 'index']);
    Route::post('holidays', [HolidayController::class, 'store']);
    Route::put('holidays/{holiday}', [HolidayController::class, 'update']);
    Route::delete('holidays/{holiday}', [HolidayController::class, 'destroy']);


    // <-----LEAVE TYPES----->
    Route::get('leave-types', [LeaveTypeController::class, 'index']);

    // <-----LEAVES----->
    Route::get('leaves', [LeaveController::class, 'index']);
});
