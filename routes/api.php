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
Route::get('/products/{category}',[ApiController::class, 'product']);
Route::get('/categories',[ApiController::class, 'category']);
Route::get('/users',[ApiController::class, 'user']);
Route::post('/transfers/{id}',[ApiController::class, 'transfer']);
//Route cache:
Route::get('/route-cache', [ApiController::class, 'route_cache']);