<?php

use App\Http\Controllers\Front\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductListController;

Route::get('/', [ProductListController::class , 'index'])->name('front.home');
Route::get('checkout',function(){
	return view('front.checkout');
} );

Route::resource('carts', CartController::class);