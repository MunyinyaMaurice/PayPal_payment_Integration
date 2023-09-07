<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
return redirect(route('logins'))->with('error','Email or password are not correct!');
} 
public function registrationPost(Request $request){
    $request->validate([
        'name' =>'required',
        'email' =>'required|email|unique:userRegister',
        'phone' =>'required',
        'password' =>'required'
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    $data['password'] = Hash::make($request->password) ;
$user= User::created($data);
if(!$user){
    return redirect(route('registers'))->with('error','Try again!');
}
return redirect(route('home'))->with('success','Logged in well!');
   } 
   function logout(){
Session::flush();
Auth::logout();
return redirect(route('logins'));
   }
}
