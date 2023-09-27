<?php

use LaravelPassportAPIRoutes\Http\Controllers\Auth\NewPasswordController;
use LaravelPassportAPIRoutes\Http\Controllers\Auth\PasswordResetLinkController;
use LaravelPassportAPIRoutes\Http\Controllers\Auth\RegisterVerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('api')->group(function () {
    Route::post('/register', LaravelPassportAPIRoutes\Http\Controllers\Auth\RegisterController::class);
    Route::post('/login', LaravelPassportAPIRoutes\Http\Controllers\Auth\LoginController::class);

    Route::get('email/verify/{id}', [RegisterVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [RegisterVerificationController::class, 'resend'])->name('verification.resend');

//Сброс пароля
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.update');
});


