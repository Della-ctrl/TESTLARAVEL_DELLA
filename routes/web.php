<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["prefix" => "kategori"], function () {
    Route::get("/", [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::get("/create", [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori.create');
    Route::post("/store", [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    Route::get("/show/{id}", [App\Http\Controllers\KategoriController::class, 'show'])->name('kategori.show');
    Route::get("/edit/{id}", [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post("/update", [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
    Route::get("/destroy/{id}", [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');
});

Route::group(["prefix" => "supplier"], function () {
    Route::get("/", [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
    Route::get("/create", [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
    Route::post("/store", [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
    Route::get("/show/{id}", [App\Http\Controllers\SupplierController::class, 'show'])->name('supplier.show');
    Route::get("/edit/{id}", [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post("/update", [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
    Route::get("/destroy/{id}", [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::group(["prefix" => "barang"], function () {
    Route::get("/", [App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');
    Route::get("/create", [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    Route::post("/store", [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    Route::get("/show/{id}", [App\Http\Controllers\BarangController::class, 'show'])->name('barang.show');
    Route::get("/edit/{id}", [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
    Route::post("/update", [App\Http\Controllers\BarangController::class, 'update'])->name('barang.update');
    Route::get("/destroy/{id}", [App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::group(["prefix" => "user"], function () {
    Route::get("/", [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get("/create", [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post("/store", [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get("/show/{id}", [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get("/edit/{id}", [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post("/update", [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get("/destroy/{id}", [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});

Route::group(["prefix" => "pengajuan"], function () {
    Route::get("/", [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get("/create", [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post("/store", [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get("/show/{id}", [App\Http\Controllers\PengajuanController::class, 'show'])->name('pengajuan.show');
    Route::get("/edit/{id}", [App\Http\Controllers\PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::post("/update", [App\Http\Controllers\PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::get("/destroy/{id}", [App\Http\Controllers\PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    Route::get("/approve/{id}", [App\Http\Controllers\PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::get("/reject/{id}", [App\Http\Controllers\PengajuanController::class, 'reject'])->name('pengajuan.reject');
    Route::get("/print/{id}", [App\Http\Controllers\PengajuanController::class, 'print'])->name('pengajuan.print');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
