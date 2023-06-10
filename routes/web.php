<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BelibarangController;
use App\Http\Controllers\TerjualController;
use App\Http\Controllers\NamapaketController;
use App\Http\Controllers\BiayatambahController;
use App\Http\Controllers\AmbiluangController;
use App\Http\Controllers\ProdukgagalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UangController;

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

//login
Route::get('/admin/login/', [AuthController::class, 'index'])->name('login');
Route::post('/admin/login/', [AuthController::class, 'login']);

//register
Route::get('/admin/register/', [RegisterController::class, 'index']);
Route::post('/admin/register/', [RegisterController::class, 'store']);

Route::Group(['middleware' => ['auth']], function () {

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/admin/home', [HomeController::class, 'create']);
Route::post('/admin/home', [HomeController::class, 'store']);


//Beli Barang
Route::get('/belibarang', [BelibarangController::class, 'index']);
Route::get('/admin/belibarang', [BelibarangController::class, 'create']);
Route::post('/admin/belibarang', [BelibarangController::class, 'store']);

//namapaket
Route::get('/terjual', [NamapaketController::class, 'index']);
Route::get('/admin/terjual', [NamapaketController::class, 'create']);
Route::get('/admin/terjual/', [NamapaketController::class, 'create']);
Route::get('/admin/terjual/{id}', [NamapaketController::class, 'show']);
Route::post('/admin/terjual', [NamapaketController::class, 'store']);
Route::post('/admin/jual/selesai', [NamapaketController::class, 'selesai']);
Route::delete('/admin/jual/delete/{namapaket}', [NamapaketController::class, 'destroy']);

//terjual
Route::post('/admin/jual/', [TerjualController::class, 'store']);
Route::delete('/admin/jual/{terjual}', [TerjualController::class, 'destroy']);

//biayatambah
Route::post('/admin/biayatambah/', [BiayatambahController::class, 'store']);
Route::delete('/admin/biayatambah/delete/{biayatambah}', [BiayatambahController::class, 'destroy']);

//ambil uang
Route::get('/ambiluang', [AmbiluangController::class, 'index']);
Route::get('/admin/ambiluang', [AmbiluangController::class, 'create'])->name('ambilcreate');
Route::post('/admin/ambiluang', [AmbiluangController::class, 'store']);


//Produk gagal
Route::get('/produkgagal', [ProdukgagalController::class, 'index']);
Route::get('/admin/produkgagal', [ProdukgagalController::class, 'create'])->name('gagalcreate');
Route::post('/admin/produkgagal', [ProdukgagalController::class, 'store']);

//delete uangs
Route::delete('/admin/modal/{modal}', [HomeController::class, 'destroy1']);

Route::delete('/admin/uang/{uang}', [HomeController::class, 'destroy2']);

Route::delete('/admin/stock/{stock}', [HomeController::class, 'destroy3']);

//logout
Route::get('/admin/logout/', [AuthController::class, 'logout']);
});

// Route::Group(['middleware' => ['auth','ceklevel:master']], function () {



// });