<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;

use App\Http\Controllers\Api\FacebookController;
use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\Api\AppleAuthController;
use App\Http\Controllers\Api\SliderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/resend-otp', [AuthController::class, 'resendOtp']);

Route::post('/login', [AuthController::class, 'login']);


Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp']);
Route::post('forgot-otp', [AuthController::class, 'forgotOtp']);

//Route::post('/verify-otp-forgot', [ForgotPasswordController::class, 'verifyOtpForgot']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/login/apple', [AppleAuthController::class, 'redirectToApple']);
Route::get('/apple/callback', [AppleAuthController::class, 'handleAppleCallback']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('slider', [SliderController::class, 'sliderList']);
});
