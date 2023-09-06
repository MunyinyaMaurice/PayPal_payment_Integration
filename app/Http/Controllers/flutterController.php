<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class flutterController extends Controller
{
    // first way
    //=========
    
    // public function flutter_payment(Request $request){
    //     return view("page.payment");
    // }
    // public function verify(Request $request){
    //     $curl = curl_init();
    //     curl_setopt_array($curl,array(
    //     CURLOPT_URL =>"https://api.flutterwave.com/v3/transactions/{$request->transation_id}/verify",
    //     CURLOPT_RETURNTRANSFER =>true,
    //     CURLOPT_ENCODING =>"",
    //     CURLOPT_MAXREDIRS =>10,
    //     CURLOPT_TIMEOUT =>0,
    //     CURLOPT_FOLLOWLOCATION =>true,
    //     CURLOPT_HTTP_VERSION =>CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST =>"GET",
    //     CURLOPT_HTTPHEADER =>array(
    //         "Content-type: application/json",
    //         "Authorization: Bearer FLWSECK_TEST-e00662d811819c5edfb5196b5750ec5a-X"
    //     ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);
    // $res = json_decode($response);
    //     return [$res];
    // }
    

    // second way
    //=========

    public function initialize( )
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
       // $order_id = Flutterwave::generateReference('momo');
        // Enter the details of the payment
        $data = [
             'public_key'=> "FLWPUBK_TEST-6fdbd1b554472c31fd44a1d77a51431d-X",
            'payment_options' => 'card,banktransfer',
            'amount' => 50,
            'email' => request()->email,
            'tx_ref' => $reference,
            //'order_id' => $order_id,
            'currency' => "RWF",
            // "phone_number" => request()->phone,
            "phone_number" => '+250782752491',
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Toyota',
                "description" => "Red",
                   "logo" =>"https://www.bookly.africa/uploads/0000/18/2022/09/13/bookly-logo-2.png"
                  
            ],
        ];
        //dd($data);
        
        $payment = Flutterwave::initializePayment($data);
        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return "something went wrong during CARD payment!";
        }else{
        // $links = "https://sandbox-flw-web-v3.herokuapp.com/pay/qyilzstmzzmr";
         return redirect($payment['data']['link']);
        // $links = "https://sandbox-flw-web-v3.herokuapp.com/pay/qyilzstmzzmr";
        // return redirect($links);
        
        
     
        }
    //     $charge = Flutterwave::payments()->momoRW($data);
    //    // dd($charge);
    // if ($charge['status'] === 'success') {
    //     # code...
    //     // Redirect to the charge url
    //     return redirect($charge['data']['redirect']);

    // }else{
    //     return "something went wrong during MOMO transaction!";
    // }
}
//    
public function redirectToFlutterwave($url)
{
    $decodedUrl = base64_decode($url);
    return redirect($decodedUrl);
}

    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ===  'successful') {

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


