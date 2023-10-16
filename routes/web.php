<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Dashboard\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OfflineOrdersController;
use App\Http\Controllers\Dashboard\ProductController;

require __DIR__.'/dashboard.php';
require __DIR__.'/front.php';
require __DIR__.'/auth.php';







Route::resource('checkouts', CheckoutController::class);

Route::get('auth/{provider}/redirect', [SocialLoginController::class,'redirect'])->name('auth.socialite.redirect');

Route::get('auth/{provider}/callback', [SocialLoginController::class,'callback'])->name('auth.socialite.callback');