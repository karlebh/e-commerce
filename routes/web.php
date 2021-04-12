<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('home')
    		->withProducts(\App\Models\Product::inRandomOrder()
    			->take(20)
    			->get());
})
	->name('home');

Route::view('tabs', 'checkout.tabs');
Route::middleware(['auth:sanctum', 'verified'])
		->get('dashboard', function () {
    			return view('dashboard');
	})->name('dashboard');


Route::post('paystack/pay', [Controllers\PaystackController::class, 'redirectToGateway'])->name('paystack.pay');
Route::get('paystack/callback', [Controllers\PaystackController::class, 'handleGatewayCallback'])
			->name('paystack.callback');

Route::post('rave/pay', [Controllers\FlutterwaveController::class, 'initialize'])->name('flutterwave.pay');
Route::get('rave/callback', [Controllers\FlutterwaveController::class, 'callback'])->name('flutterwave.callback');

Route::view('success', 'checkout.success')->name('checkout.success');
Route::view('failure', 'checkout.failure')->name('checkout.failure');
Route::post('cart', [Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('cart/checkout', [Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::get('cart', [Controllers\CartController::class, 'index'])->name('cart.index');
Route::delete('cart/{cart}', [Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('all', [Controllers\CartController::class, 'all'])->name('cart.all');
Route::patch('editQuantity', [Controllers\CartController::class, 'editQuantity'])->name('cart.edit.quantity');

Route::get('checkout', [Controllers\CheckoutController::class, 'index'])
			->middleware('checkout')
			->name('checkout.index');

Route::group([
	// 'middleware' => 'admin'
], function () {
	Route::resources([
		'product' => Controllers\ProductController::class,
		'category' => Controllers\CategoryController::class,
	]);
});
