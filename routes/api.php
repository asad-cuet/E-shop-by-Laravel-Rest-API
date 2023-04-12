<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Api\AuthController;
use Api\ProductController;
use Api\CategoryController;
use Api\OrderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::post('login','login');
    Route::post('logout','logout');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('products','index');
    Route::get('products/{product_id}','viewProduct');
});
Route::controller(CategoryController::class)->group(function(){
    Route::get('categories','index');
    Route::get('categories/{id}','categoryView');
});


Route::controller(OrderController::class)->group(function(){
    Route::post('proceed-order','proceedOrder');
    Route::post('my-orders','myOrders');
    Route::get('order-info/{order_id}','orderInfo');
    Route::get('my-orders/{order_id}','myOrderDetails');
});