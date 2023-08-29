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
});
// paypal
Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal_success');
Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel'); 

// FlutterWave
Route::any('flutter/payment',[flutterController::class,'flutter_payment'])->name('flutter');