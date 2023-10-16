<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductListController;

Route::get('/', [ProductListController::class , 'index'])->name('home');
Route::get('/search',[ProductListController::class , 'search'])->name('search');
Route::get('myOrders', [ProductListController::class, 'orderList'])->name('orderList');
Route::get('myOrders/filter', [ProductListController::class, 'filter'])->name('filter');
Route::put('myOrders/update/{id}',[ProductListController::class,'update'])->name('myOrderUpdate');


Route::get('checkout',function(){
	return view('front.checkout');
} );
