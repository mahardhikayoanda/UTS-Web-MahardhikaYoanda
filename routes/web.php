<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Halaman utama diarahkan ke daftar produk
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource route untuk semua fungsi CRUD
Route::resource('products', ProductController::class);

// Route untuk produk yang dihapus (soft delete)
Route::get('deleted-products', [ProductController::class, 'deleted'])->name('products.deleted');

// Route untuk restore produk
Route::post('restore-product/{id}', [ProductController::class, 'restore'])->name('products.restore');
