<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


//pages routes
Route::get('/' , [HomeController::class , 'index']);
Route::get('/about' , [HomeController::class , 'about']);
Route::get('/contact' , [HomeController::class , 'contact']);
Route::get('/portfolio' , [HomeController::class , 'portfolio']);
Route::get('/faq' , [HomeController::class , 'faq']);
Route::get('/pricing' , [HomeController::class , 'pricing']);
Route::get('/product/detail' , [HomeController::class , 'product_detail']);
Route::get('/product' , [HomeController::class , 'product']);
Route::get('/shipping' , [HomeController::class , 'shipping']);

Route::get('/signup-page' , [HomeController::class , 'signup']);
Route::get('/login-page' , [HomeController::class , 'login']);



