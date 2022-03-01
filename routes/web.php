<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailPembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/welcome', function () {
    return view('welcome');
});
*/

Route::get( '/', function () {
    return view( 'home', [
        "title" => "Antrian Online Pelayanan Pelanggan PDAM Tirta Khatulistiwa Pontianak",
        "nama" => "Sarah Shahab",
        "email" => "sarahshahab19@gmail.com"
    ]);
});

Route::get('/info-pelayanan-pelanggan', [PostController::class, 'index']);
Route::get('/info-pelayanan-pelanggan/{post:slug}', [PostController::class, 'show']);


Route::get('/profile', function () {
    return view( 'profile', [
        "title" => "Profil",
    ]);
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/antrian-pembayaran', [PembayaranController::class, 'index']);
Route::get('/detail-pembayaran', [DetailPembayaranController::class, 'index']);