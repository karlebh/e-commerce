<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('home')
    		->withProducts(
    			\App\Models\Product::where('quantity', '>', 0)
    			->take(20)
    			->paginate());
})
	->name('home');

Route::view('tabs', 'checkout.tabs');

Route::post('paystack/pay', [Controllers\PaystackController::class, 'redirectToGateway'])->name('paystack.pay');
Route::get('paystack/callback', [Controllers\PaystackController::class, 'handleGatewayCallback'])
			->name('paystack.callback');

Route::post('rave/pay', [Controllers\FlutterwaveController::class, 'initialize'])->name('flutterwave.pay');
Route::get('rave/callback', [Controllers\FlutterwaveController::class, 'callback'])
			->name('flutterwave.callback');

Route::view('success', 'checkout.success')->name('checkout.success');
Route::view('failure', 'checkout.failure')->name('checkout.failure');

Route::get('cart', [Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('cart', [Controllers\CartController::class, 'store'])->name('cart.store');
Route::patch('cart/{id}', [Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{id}', [Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('all', [Controllers\CartController::class, 'all'])->name('cart.all');

Route::get('checkout', [Controllers\CheckoutController::class, 'index'])
	->middleware('checkout')
	->name('checkout.index');

Route::get('category/{category}', [Controllers\CategoryController::class, 'show'])
	->name('category.show');
	
Route::middleware('admin')->group(function () {
	Route::get('product/create', [Controllers\ProductController::class, 'create'])
		->name('product.create');
	Route::post('product/store', [Controllers\ProductController::class, 'store'])
		->name('product.store');
});

// Route::post('/pay', [Controllers\PayController::class, 'initialize'])->name('pay');
// Route::get('/rave/callback', [Controllers\PayController::class, 'callback'])->name('callback');
Route::view('payer', 'pay');