<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
   public function logging(){
    return view('userLogin');
   } 
   public function registration(){
    return view('userRegister');
   } 
   public function loggingPost(Request $request){
$request->validate([
    'email' =>'required',
    'password' =>'required'
]);
    $credentials = $request->only('email','password');
if(Auth::attempt($credentials)){
    return redirect()->intended(route('home'))->with('success','Logged in well!');
}   
return redirect(route('logins'))->with('error','Email lor password are not correct!');
} 
public function registrationPost(Request $request){
    $request->validate([
        'name' =>'required',
        'email' =>'required',
        'phone' =>'required|email|unique:userRegister',
        'password' =>'required'
    ]);
   } 
}
