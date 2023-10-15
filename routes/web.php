<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;


 


 

 
    Route::resource('categories',CategoryController::class) ;

    Route::resource('products',CategoryController::class) ;
   
    Route::resource('users',UserController::class) ;
   
    
 









Route::get('/', function () {
    return view('layouts.dashboard'); 
});




 
