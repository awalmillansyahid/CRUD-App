<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'add'])->name('product.add'); // Halaman tambah produk
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit'); // Halaman edit produk
    Route::post('/save', [ProductController::class, 'save'])->name('product.save'); // Simpan produk baru
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update'); // Update produk (perbaikan di sini)
    Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete'); // Hapus produk
    Route::get('/list', [ProductController::class, 'list'])->name('product.list'); // Halaman daftar produk
});

// Tambahkan route untuk products.index
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
