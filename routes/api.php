<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckOutController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('sign-up',[AuthController::class,'register'])->middleware('guest:sanctum');
Route::post('login',[AuthController::class,'login'])->middleware('guest:sanctum');
Route::apiResource('products',ProductController::class);
Route::apiResource('cart',CartController::class);
Route::apiResource('order',CheckOutController::class);

