<?php 

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OnlineOrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;


Route::group(['prefix' => 'dashboard' , 'middleware'=>'user.type'], function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('users', UserController::class);

    Route::resource('products', ProductController::class);


    Route::prefix('orders')->group(function () {
        Route::resource('offline', OfflineOrdersController::class);
        Route::resource('online', OnlineOrdersController::class);
    });
});
