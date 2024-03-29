<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('/home', function () {
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
        "image" => "Profile.jpg",
    ]);
});

Route::get('admindash', function(){
    return view('admindash', [
        "title" => "Admin Dashboard"
    ]);
});

Route::get('/login', [LoginController::class, 'index']);