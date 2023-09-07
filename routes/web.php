<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\flutterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;

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
})->name('home');
/*User login route */
Route::get('/logins', [userController::class,'logging'])->name('logins');
Route::post('/logins', [userController::class,'loggingPost'])->name('logins.post');
Route::get('/registers',[userController::class,'registration'])->name('registers');
Route::post('/registers',[userController::class,'registrationPost'])->name('registers.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* PayPal */
Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [PaypalController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal_cancel');


/* FlutterWave */

// The route that the button calls to initialize payment
 Route::post('/pay', [flutterController::class, 'initialize'])->name('pay');
//Route::post('/pay/{bookingId}', [flutterController::class, 'initialize'])->name('pay');

// The callback url after a payment
Route::get('/rave/callback', [flutterController::class, 'callback'])->name('callback');