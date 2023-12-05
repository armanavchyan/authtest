<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signupPost');
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signin', [AuthController::class, 'signinPost'])->name('signinPost');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/loginout', [App\Http\Controllers\HomeController::class, 'loginout'])->name('loginout');
