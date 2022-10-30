<?php

use App\Http\Controllers\Application\AuthController;
use App\Http\Controllers\Application\CartController;
use App\Http\Controllers\Application\CategoryController;
use App\Http\Controllers\Application\OrderController;
use App\Http\Controllers\Application\PaymentController;
use App\Http\Controllers\Application\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//protected routes

Route::group(['middleware'=>['auth:sanctum']],function (){
    Route::post('/logout',[AuthController::class,'logout']);
    //products
    Route::resource('/products',ProductController::class);
    //categories
    Route::resource('/categories',CategoryController::class);
    //search with category
    Route::get('/categories/search/{id}',[CategoryController::class,'search']);
    //cart
    Route::resource('/carts',CartController::class);
    //orders
    Route::resource('/orders',OrderController::class);
    //payments
    Route::resource('/payments',PaymentController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
