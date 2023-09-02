<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class flutterController extends Controller
{
    // first way
    //=========
    /*
    public function flutter_payment(Request $request){
        return view("page.payment");
    }
    public function verify(Request $request){
        return $request->transation_id;
    }
    */

    // second way
    //=========
/**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $order_id = Flutterwave::generateReference('momo');
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => 50,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "USD",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Toyota',
                "description" => "Red"
            ]
        ];
        //dd($data);
        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return "something went wrong!";
        }

        return redirect($payment['data']['link']);
        
    }
    
    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        // dd($data);
        return "payment went well!"; 
        }
        elseif ($status ==  'cancelled'){
            return "canceled!";
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
            return "somthing went wrong!";
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your success page else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purposes)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}


