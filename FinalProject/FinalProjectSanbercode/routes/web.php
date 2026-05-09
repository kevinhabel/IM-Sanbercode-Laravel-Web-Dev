<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'tampilMasuk'])->name('login');
    Route::post('/masuk', [AuthController::class, 'prosesMasuk'])->name('masuk.proses');
    Route::get('/daftar', [AuthController::class, 'tampilDaftar'])->name('daftar');
    Route::post('/daftar', [AuthController::class, 'prosesDaftar'])->name('daftar.proses');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('beranda');
    })->name('beranda');
    Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar');
    Route::get('/profil', [ProfileController::class, 'tampil'])->name('profil.tampil');
    Route::post('/profil', [ProfileController::class, 'simpan'])->name('profil.simpan');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('kategori', CategoryController::class)->except(['index', 'show']);
    Route::resource('buku', BookController::class)->except(['index', 'show']);
});

Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{kategori}', [CategoryController::class, 'show'])->name('kategori.show');
Route::get('/buku', [BookController::class, 'index'])->name('buku.index');
Route::get('/buku/{buku}', [BookController::class, 'show'])->name('buku.show');

Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/tambah', [TransactionController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transaksi.store');
});
