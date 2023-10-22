<?php 

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ChecksOfflineController;
use App\Http\Controllers\Dashboard\OnlineOrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;
 

Route::group(['prefix' => 'dashboard' , 'middleware'=>'user.type'], function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('users', UserController::class);

    Route::resource('products', ProductController::class);

    //soft deleted
    Route::get('archive' , [ProductController::class, 'archive'])->name('archive');
    Route::put('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
     


    Route::prefix('orders')->group(function () {
        Route::resource('offline', OfflineOrdersController::class);
         Route::resource('online', OnlineOrdersController::class);
         Route::resource('checks', ChecksOfflineController::class);

        //route to make filter
         Route::get('filter', [ChecksOfflineController::class, 'filter'])->name('filter');
         //route to make search by product name 
         Route::get('search',[OfflineOrdersController::class , 'search'])->name('search');
    });
});
