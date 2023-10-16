<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductListController;

Route::get('/', [ProductListController::class , 'index']);
Route::get('checkout',function(){
	return view('front.checkout');
} );
