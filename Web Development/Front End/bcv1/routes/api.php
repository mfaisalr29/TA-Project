<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalSampahController;


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


Route::post('/auth/login', [AuthController::class, 'login']);

Route::apiResource('users', UserController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('user/profile', [UserController::class, 'profile']);
});

Route::post('/schedule/get', [JadwalSampahController::class, 'getSchedule']);
Route::post('/schedule/edit', [JadwalSampahController::class, 'editSchedule'])->middleware('auth:sanctum');

Route::post('/dashboard/data', [JadwalSampahController::class, 'getDashboardData'])->middleware('auth:sanctum');

Route::post('/bills', [BillController::class, 'getBills'])->middleware('auth:sanctum');
Route::post('/bills/add', [BillController::class, 'addBill'])->middleware('auth:sanctum');
Route::get('/bills/{id}', [BillController::class, 'getBillDetails'])->middleware('auth:sanctum');
Route::post('/bills/update', [BillController::class, 'updateBill'])->middleware('auth:sanctum');

Route::post('/user/profile', [ProfileController::class, 'getProfile'])->middleware('auth:sanctum');
Route::post('/user/update', [ProfileController::class, 'updateProfile'])->middleware('auth:sanctum');
