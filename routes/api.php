<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
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
Route::get('/',[ApiController::class, 'index']);
// See all product by category
Route::get('/products/{category}',[ApiController::class, 'product']);
// See all category
Route::get('/categories',[ApiController::class, 'category']);
// Route cache:
Route::get('/route-cache', [ApiController::class, 'route_cache']);
// Transfer Saldo
Route::put('/transfers', [ApiController::class, 'transfer']);
// Transaction
Route::post('/transactions', [ApiController::class, 'transaction']);