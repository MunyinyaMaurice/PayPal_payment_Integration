<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlutterContro;
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
    // return view('FlutterPage');
    return view('welcome');
   //return view("page.payment");
    
       
});
// paypal
Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal_success');
Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel'); 

// FlutterWave
Route::any('payment-page',[FlutterContro::class,'flutter_payment']);
Route::any('verify-payment',[FlutterContro::class,'verify']);

// FlutterWave2 
// The route that the button calls to initialize payment
// Route::post('/pay', [flutterController::class, 'initialize'])->name('pay');
// // The callback url after a payment
// Route::get('/callback', [flutterController::class, 'callback'])->name('callback');
// //Route::get('example', [flutterController::class, 'display'])->name('axample');
// Route::get('/redirect-to-flutterwave/{url}', [flutterController::class, 'redirectToFlutterwave'])->name('redirect-to-flutterwave');
Route::prefix('Bookly-Africa')->group(function () {
    Route::post('/pay', [flutterController::class, 'initialize'])->name('pay');
    Route::get('/callback', [flutterController::class, 'callback'])->name('callback');
    Route::get('/redirect-to-flutterwave/{url}', [flutterController::class, 'redirectToFlutterwave'])->name('redirect-to-flutterwave');
});
