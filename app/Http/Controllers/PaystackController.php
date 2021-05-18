<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paystack;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition\Cart;

class PaystackController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $data = request()->validate([
            'name' => 'required|string|min:3|max:70',
            'email' => 'required|email',
        ]);

        try {
            $success = Paystack::getAuthorizationUrl()->redirectNow();

            \Cart::session('guest')->clear();
            session()->flash('message', 'Transaction Via Paystack was successful!');
            return $success;

        } catch(\Exception $e) {
            session()->flash('error', 'Transaction Via Paystack was not successful!');
            return back();
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}