<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
    	return view('checkout.index');
    }

    public function checkout()
    {
    	// request()->validate([
    	// 	'id' => '',
    	// 	'name' => '',
    	// 	'price' => '',

    	// ]);
    	
		\Stripe\Stripe::setApiKey(config('services.stripe.client_secret'));

		request()->header('Content-Type', 'application/json');

		$checkout = \Stripe\Checkout\Session::create([
		  'payment_method_types' => ['card'],
		  'line_items' => [[
		    'price_data' => [
		      'currency' => config('services.stripe.currency'),
		      'unit_amount' => 2000,
		      'product_data' => [
		        'name' => 'Stubborn Attachments',
		        'images' => ["https://i.imgur.com/EHyR2nP.png"],
		      ],
		    ],
		    'quantity' => 1,
		  ]],
		  'mode' => 'payment',
		  'success_url' => route('checkout.success'),
		  'cancel_url' => route('checkout.failure'),
		]);

		// json_encode(['id' => $checkout_session->id]);
	}

}
