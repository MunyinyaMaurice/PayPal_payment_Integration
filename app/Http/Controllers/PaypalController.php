<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
 public function payment(Request $request){

dd($request->price);
 }

}