<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/buy/{product}', [ProductController::class, 'buy'])->name('products.buy');
    Route::post('/charge/{product}', [ProductController::class, 'charge'])->name('products.charge');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/payment/completed', function () {
    return view('payment.completed');
})->name('payment.completed');
