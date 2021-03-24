<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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


Route::middleware(['guest'])->group(function () {
    Route::view('/register', 'auth.register');
    Route::post('/register', [RegisterController::class,'store'])->name('register');
    Route::view('/login', 'auth.login');
    Route::post('/login', [LoginController::class,'store'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::view('/', 'home');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::post('/admin', [UserController::class, 'store'])->name('create.user');
    Route::post('/admin/update', [UserController::class, 'update'])->name('update.user');
    Route::post('/admin/{user:id}/delete', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('create.category');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/product', [ProductController::class, 'store'])->name('create.product');
});
