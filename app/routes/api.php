<?php

use Illuminate\Support\Facades\Route;
use IsEazy\Infrastructure\Ui\Http\Shop\CreateShopController;
use IsEazy\Infrastructure\Ui\Http\Shop\DeleteShopController;
use IsEazy\Infrastructure\Ui\Http\Shop\EditShopController;
use IsEazy\Infrastructure\Ui\Http\Shop\GetShopController;
use IsEazy\Infrastructure\Ui\Http\Shop\ListShopsController;
use IsEazy\Infrastructure\Ui\Http\Shop\SellProductController;


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

Route::post('/shop', CreateShopController::class);
Route::get('/shop', ListShopsController::class);
Route::get('/shop/{id}', GetShopController::class);
Route::delete('/shop/{id}', DeleteShopController::class);
Route::put('/shop/{id}', EditShopController::class);
Route::put('/sell-product-of-shop/{shopId}/product/{productId}', SellProductController::class);
