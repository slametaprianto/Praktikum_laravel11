<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get(
    '/',
    [LoginController::class, 'login']
)->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('printpdf', [UserController::class, 'printpdf'])->name('printuser');
Route::get('userexcel', [UserController::class, 'printExcel'])->name('exportuser');
Route::get('productpdf', [ProductController::class, 'productpdf'])->name('printproduct');
Route::get('categorypdf', [CategoryController::class, 'categorypdf'])->name('printcategory');

Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
// Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
// Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
// Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
// Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
// Route::get('/satuan/{id}', [SatuanController::class, 'show'])->name('satuan.show');
// Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
// Route::delete('/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
