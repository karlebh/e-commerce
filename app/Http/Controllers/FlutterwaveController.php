<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Darryldecode\Cart\CartCondition\Cart;


class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        $data = request()->validate([
            'name' => 'required|string|min:3|max:70',
            'email' => 'required|email',
        ]);

            //This generates a payment reference
            $reference = Flutterwave::generateReference();

            // Enter the details of the payment
            $data = [
                'payment_options' => 'card', 
                'amount' => request()->amount,
                'email' => $data['email'],
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('flutterwave.callback'),
                'customer' => [
                    'email' => $data['email'],
                    "name" => $data['name'],
                ],

                "customizations" => [
                    "title" => 'Order placed on lara-ecommerce website',
                    "description" => (new \Carbon\Carbon(now()))->diffForHumans(),
                ]
            ];

            $payment = Flutterwave::initializePayment($data);
    
        if ($payment['status'] !== 'success') {
            session()->flash('error', 'Transaction Via Flutterwave not successful!');
            return redirect()->back();
        }

        session()->flash('message', 'Transaction Via Flutterwave was successful!');
        \Cart::session('guest')->clear();
        return redirect($data['redirect_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        dd($data);
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the $data['data']['status'] is 'successful'
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}