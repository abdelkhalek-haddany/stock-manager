<?php

use App\Exports\ProductsExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class)->middleware('auth');

Route::get('/export-products', function () {
    return Excel::download(new ProductsExport, 'products.xlsx');
})->name('export.products');