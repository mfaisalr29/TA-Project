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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/admin/data', [AdminController::class, 'getAdminData']);
    Route::post('/admin/schedule/edit', [JadwalSampahController::class, 'editSchedule']);
    Route::post('/admin/bills/add', [BillController::class, 'addBill']);
    Route::post('/admin/bills/update', [BillController::class, 'updateBill']);
    Route::get('/admin/schedule', [JadwalSampahController::class, 'getSchedule']);
    Route::post('/admin/dashboard/data', [JadwalSampahController::class, 'getDashboardData']);
    Route::post('/admin/bills', [BillController::class, 'getBills']);
    Route::get('/admin/bills/{id}', [BillController::class, 'getBillDetails']);
    Route::post('/admin/user/profile', [ProfileController::class, 'getProfile']);
    Route::post('/admin/user/update', [ProfileController::class, 'updateProfile']);
    Route::post('/admin/daftarwarga', [UserController::class, 'registerWarga']);
    Route::post('/admin/find-name', [UserController::class, 'findName']);
    Route::get('/warga/schedule', [JadwalSampahController::class, 'getSchedule']);  
    Route::post('/warga/dashboard/data', [JadwalSampahController::class, 'getDashboardData']);
    Route::post('/warga/bills', [BillController::class, 'getBills']);
    Route::get('/warga/bills/{id}', [BillController::class, 'getBillDetails']);
    Route::post('/warga/user/profile', [ProfileController::class, 'getProfile']);
});
