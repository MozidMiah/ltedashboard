<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//For Login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login.check');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update');

        Route::get('status/{id}', [CategoryController::class, 'status'])->name('status');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

});

//For Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot.password.post');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');
