<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|-----------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk login dan home
Route::get('/', [UserController::class, 'showLogin'])->name('login');
Route::post('/', [UserController::class, 'login'])->name('login.user');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/home', [Controller::class, 'landing'])->name('home');

// Fitur siswa
Route::prefix('/data')->name('data.')->group(function() {
    Route::get('/add', [DataController::class, 'create'])->name('create');
    Route::post('/add', [DataController::class, 'store'])->name('store');
    Route::get('/', [DataController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [DataController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [DataController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [DataController::class, 'update'])->name('update');
    Route::put('/edit/stock/{id}', [DataController::class, 'updateStock'])->name('update.stock');
});

// Fitur user
Route::prefix('/users')->name('users.')->group(function() { 
    Route::get('/', [UserController::class, 'index'])->name('index'); 
    Route::get('/add', [UserController::class, 'create'])->name('create'); 
    Route::post('/store', [UserController::class, 'store'])->name('store'); 
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [UserController::class, 'update'])->name('update'); 
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});

// Register
Route::prefix('/auth')->name('auth.')->group(function () {
    // Route untuk menampilkan form sign up
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

    // Route untuk menghandle data yang dikirim dari form sign up
    Route::post('/register', [RegisterController::class, 'register'])->name('register.user');
});

