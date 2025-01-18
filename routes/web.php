<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('printpdf', [UserController::class, 'printpdf'])->name('printuser');
Route::get('userexcel', [UserController::class, 'printExcel'])->name('exportuser');
Route::get('productpdf', [ProductController::class, 'productpdf'])->name('printproduct');
Route::get('categorypdf', [CategoryController::class, 'categorypdf'])->name('printcategory');

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
Route::get('/satuan/{id}', [SatuanController::class, 'show'])->name('satuan.show');
Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
Route::delete('/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
