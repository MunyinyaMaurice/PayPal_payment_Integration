<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class flutterController extends Controller
{
    public function flutter_payment(Request $request){
        return view("page.payment");
    }
}
