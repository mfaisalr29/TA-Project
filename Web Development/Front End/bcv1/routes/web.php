<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginControllerAdmin;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "name" => "Bandung City View I"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Muhammad Fharist",
        "email"=> "muhammadfharist1203@gmail.com",
        "image" => "Bluerose.jpg" 
    ]);
});

Route::get('/lokasi', function () {
    return view('lokasi', [
        "title" => "Lokasi",
        "name" => "Lokasi BCV I",
    ]);
});

Route::get('/kontak', function () {
    return view('kontak', [
        "title" => "Kontak",
        "name" => "Kontak BCV I",
    ]);
});

Route::get('/dashboard', function(){
    return view('dashboard', [
        "title" => "Dashboard",
    ]);
});

Route::get('/dashboardadmin', function(){
    return view('dashboardadmin', [
        "title" => "Dashboard",
    ]);
});


Route::get('/adminprofile', function(){
    return view('adminprofile', [
        "title" => "Admin Profile"
    ]);
});

Route::get('/profilewarga', function(){
    return view('profilewarga', [
        "title" => "Profile Warga"
    ]);
});

Route::get('/profileadmin', function(){
    return view('profileadmin', [
        "title" => "Profile Admin"
    ]);
});

Route::get('/tagihanipladmin', function(){
    return view('tagihanipladmin', [
        "title" => "Tagihan IPL Admin"
    ]);
});

Route::get('/tagihan', function(){
    return view('tagihan', [
        "title" => "Input Tagihan"
    ]);
});

Route::get('/kondisi', function(){
    return view('kondisi', [
        "title" => "Kondisi Air dan Alat"
    ]);
});

Route::get('/detailtagihan', function(){
    return view('tagihaniplwarga', [
        "title" => "Tagihan IPL Warga"
    ]);
});

Route::get('/detailtagihan', function(){
    return view('tagihaniplwarga', [
        "title" => "Tagihan IPL Warga"
    ]);
});

Route::get('/daftarwarga', function(){
    return view('daftarwarga', [
        "title" => "Daftar Akun Warga"
    ]);
});

Route::get('/login', [LoginController::class, 'index']);