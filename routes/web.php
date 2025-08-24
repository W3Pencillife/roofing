<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteFormController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminResetPasswordController;


Route::get('/', function () {
    return view('welcome');
});

//submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');

//Partner Links Path
Route::get('/partners', [PartnerController::class, 'index']);

//service category
Route::get('/services/{slug}', [PostController::class, 'showBySlug'])->name('services.category');


// Route for Admin Panel
// Admin Login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

// Admin Register
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('admin/register', [AdminController::class, 'registerSubmit'])->name('admin.register.submit');

// Admin Dashboard (protected)
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('admin.dashboard');

// Forgot Password Form
Route::get('admin/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('admin.password.request');

Route::post('admin/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('admin.password.email');

// Reset Password Form
Route::get('admin/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])
    ->name('admin.password.reset');

Route::post('admin/password/reset', [AdminResetPasswordController::class, 'reset'])
    ->name('admin.password.update');










