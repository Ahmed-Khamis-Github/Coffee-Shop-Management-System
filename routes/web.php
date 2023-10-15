<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;
 


 

 
    Route::resource('categories',CategoryController::class) ;
   
    Route::resource('users',CategoryController::class) ;

    Route::resource('products',ProductController::class);
   
    
    Route::prefix('orders')->group(function () {
        Route::resource('offline', OfflineOrdersController::class);
    });









Route::get('/', function () {
    return view('front.home'); 
});




 
