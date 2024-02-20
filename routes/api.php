<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;

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


//purchase route
Route::post('/purchase/plans' ,[ApiController::class , 'purchase-plans']);
Route::post('/login' , [ApiController::class , 'login']);
Route::get('/verify-email/{token}', [ApiController::class , 'verifyEmail']);

Route::middleware(['web'])->group(function () {
    Route::post('/send-otp' , [ApiController::class , 'sendOtp']);
    Route::get('/otp-check' ,[HomeController::class , 'otpcheck']);
    Route::post('/verify-otp' ,[ApiController::class , 'verifyOtp']);
    Route::get('/set-password' ,[HomeController::class , 'setpassword']);
    Route::post('/setpassword' ,[ApiController::class , 'setPassword']);
    Route::post('/signup',[ApiController::class , 'signup']);

});
