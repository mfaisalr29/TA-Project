<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalSampahController;

Route::post('/auth/login', [AuthController::class, 'login']);

// Rute yang dapat diakses oleh semua pengguna yang diautentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rute yang dapat diakses oleh admin
Route::middleware(['auth:sanctum', 'checkRole:admin'])->group(function () {
    Route::post('/admin/data', [AdminController::class, 'getAdminData']);
    Route::post('/schedule/edit', [JadwalSampahController::class, 'editSchedule']);
    Route::post('/bills/add', [BillController::class, 'addBill']);
    Route::post('/bills/update', [BillController::class, 'updateBill']);
    Route::get('/schedule', [JadwalSampahController::class, 'getSchedule']);
    Route::post('/dashboard/data', [JadwalSampahController::class, 'getDashboardData']);
    Route::post('/bills', [BillController::class, 'getBills']);
    Route::get('/bills/{id}', [BillController::class, 'getBillDetails']);
    Route::post('/user/profile', [ProfileController::class, 'getProfile']);
    Route::post('/user/update', [ProfileController::class, 'updateProfile']);
    Route::post('/daftarwarga', [UserController::class, 'registerWarga']);
    Route::post('/find-name', [UserController::class, 'findName']);
});

// Rute yang dapat diakses oleh warga
Route::middleware(['auth:sanctum', 'checkRole:warga'])->group(function () {
    Route::get('/schedule', [JadwalSampahController::class, 'getSchedule']);  
    Route::post('/dashboard/data', [JadwalSampahController::class, 'getDashboardData']);
    Route::post('/bills', [BillController::class, 'getBills']);
    Route::get('/bills/{id}', [BillController::class, 'getBillDetails']);
    Route::post('/user/profile', [ProfileController::class, 'getProfile']);
});
