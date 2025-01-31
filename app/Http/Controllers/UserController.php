<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   function userRegistration(Request $request){

    try{User::create([
        'firstname'=>$request->input('firstname'),
        'lastname'=>$request->input('lastname'), 
        'email'=>$request->input('email'),
        'phone'=>$request->input('phone'),
        'password'=>$request->input('password'),
    ]);

    return response()->json(['status' => "success",'message'=>'User Created Successfully'],200);}
    catch(Exception ){
        
        return response()->json(['status' => "error",'message'=>'Something went wrong'],500)

   } 
} 
}
