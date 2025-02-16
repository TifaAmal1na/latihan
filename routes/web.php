<?php

use Illuminate\Support\Facades\Route;
// use App\Filament\Pages\Auth\Login;
// use App\Filament\Pages\Auth\Register;

// Route::get('/admin/login', Login::class)->name('filament.admin.auth.login');
// Route::get('/admin/register', Register::class)->name('filament.admin.auth.register');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    // Logic untuk menampilkan semua produk
})->middleware('permission:view products');

Route::get('/products/create', function () {
    // Logic untuk menampilkan form tambah produk
})->middleware(['role:Admin|Merchant', 'permission:manage own products']);

Route::post('/products', function () {
    // Logic untuk menyimpan produk baru
})->middleware(['role:Admin|Merchant', 'permission:manage own products']);

Route::get('/products/{id}/edit', function ($id) {
    // Logic untuk menampilkan form edit produk
})->middleware(['role:Admin|Merchant', 'permission:manage own products']);

Route::put('/products/{id}', function ($id) {
    // Logic untuk memperbarui data produk
})->middleware(['role:Admin|Merchant', 'permission:manage own products']);

Route::delete('/products/{id}', function ($id) {
    // Logic untuk menghapus produk
})->middleware(['role:Admin', 'permission:delete products']);

Route::get('/orders', function () {
    // Logic untuk menampilkan semua pesanan
})->middleware(['role:Admin|Merchant', 'permission:view orders']);

Route::post('/orders', function () {
    // Logic untuk membuat pesanan baru
})->middleware(['role:Customer', 'permission:purchase products']);

Route::get('/orders/{id}', function ($id) {
    // Logic untuk menampilkan detail pesanan
})->middleware(['role:Customer|Merchant', 'permission:view orders']);

Route::get('/users', function () {
    // Logic untuk menampilkan daftar pengguna
})->middleware(['role:Admin', 'permission:manage users']);