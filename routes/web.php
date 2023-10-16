<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CheckoutController;
use App\Http\Controllers\Dashboard\OnlineOrdersController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Front\CartController;

    Route::resource('categories',CategoryController::class) ;
   
    Route::resource('users',UserController::class) ;
   
    
 









Route::get('/', function () {
    return view('front.home'); 
});




Route::resource('carts',CartController::class);
Route::resource('checkouts',CheckoutController::class);
Route::resource('products',ProductController::class);
Route::prefix('orders')->group(function(){
    Route::resource('offline',OfflineOrdersController::class);
    Route::resource('online',OnlineOrdersController::class);
});