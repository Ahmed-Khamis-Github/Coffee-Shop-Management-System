<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Front\ProductListController;
 
    //routes of dashboard(admin)
 
    Route::resource('categories',CategoryController::class) ;
   
    Route::resource('users',CategoryController::class) ;

    Route::resource('products',ProductController::class);
   
    
    Route::prefix('orders')->group(function () {
        Route::resource('offline', OfflineOrdersController::class);
    });


    //routes of Front
   Route::resource('/',ProductListController::class);














 
