<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductListController;

Route::get('/', [ProductListController::class , 'index'])->name('home');

Route::get('/search',[ProductListController::class , 'search'])->name('search');
Route::resource('carts', CartController::class);
Route::post('carts/{id}',[CartController::class,'addToCart'])->name('cart.add') ;


Route::group(['middleware'=>"auth"],function(){

	Route::get('myOrders', [ProductListController::class, 'orderList'])->name('orderList');
	Route::get('myOrders/filter', [ProductListController::class, 'filter'])->name('filter');
	Route::put('myOrders/update/{id}',[ProductListController::class,'update'])->name('myOrderUpdate');
 	Route::resource('checkout', CheckOutController::class);
	
}) ;
