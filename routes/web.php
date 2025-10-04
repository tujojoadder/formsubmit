<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('register');
    });
    Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
    Route::get('/login', [App\Http\Controllers\UserController::class, 'showLogin'])->name('login');
    /* user login */
    Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login.submit');
    // Admin Login
    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/user/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('user.logout');
});

/* admin */
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('users.update');
    Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
});
