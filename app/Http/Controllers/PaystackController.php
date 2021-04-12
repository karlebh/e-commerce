<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paystack;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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

        try{
            $success = Paystack::getAuthorizationUrl()->redirectNow();

            \Cart::session('guest')->clear();

            return $success;
        }catch(\Exception $e) {
            return Redirect::back()
                    ->withMessage(
                        [
                            'msg'=>'The paystack token has expired. Please refresh the page and try again.',
                            'type'=>'error'
                        ]);
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