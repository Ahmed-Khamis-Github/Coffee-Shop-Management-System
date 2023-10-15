<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;


 


 

 
    Route::resource('categories',CategoryController::class) ;

    Route::resource('products',CategoryController::class) ;
   
    Route::resource('users',CategoryController::class) ;
   
    
    Route::prefix('orders')->group(function () {
        Route::resource('offline', OfflineOrdersController::class);
    });









Route::get('/', function () {
    return view('layouts.dashboard'); 
});




 
