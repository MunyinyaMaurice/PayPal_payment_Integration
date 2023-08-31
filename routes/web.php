<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\flutterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
   // return view("page.payment");
    
       
});
// paypal
Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal_success');
Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel'); 

// FlutterWave
Route::any('payment-page',[flutterController::class,'flutter_payment']);
Route::any('verify-payment',[flutterController::class,'verify']);

// FlutterWave2 
// The route that the button calls to initialize payment
Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');