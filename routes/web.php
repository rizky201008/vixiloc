<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;

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

Route::get('/', function () {
    return view('welcome',[
        'title' => 'Welcome'
    ]);
})->middleware('guest');

Route::get('/home', [MainController::class, 'index']);
Route::get('/help', [MainController::class, 'help']);
Route::get('/product/{slug}', [MainController::class, 'category'])->middleware('auth');
Route::post('/product/{slug}', [MainController::class, 'tx'])->middleware('auth');
Route::get('/auth/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'auth']);
Route::get('/auth/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/auth/register', [AuthController::class, 'store']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::get('/account', [AkunController::class, 'index'])->middleware('auth');
Route::get('/account/deposit', [AkunController::class, 'deposit'])->middleware('auth');