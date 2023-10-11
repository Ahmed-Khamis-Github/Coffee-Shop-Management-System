<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;


 


 

 
    Route::resource('categories',CategoryController::class) ;

    Route::resource('products',CategoryController::class) ;
   
    Route::resource('users',CategoryController::class) ;
   
    
 









Route::get('/', function () {
    return view('layouts.dashboard'); 
});




 
