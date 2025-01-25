<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   function userRegistration(Request $request){

    User::create([
        'firstname'=>$request->input('firstname'),
        'lastname'=>$request->input('lastname'), 
        'email'=>$request->input('email'),
        'phone'=>$request->input('phone'),
        'password'=>$request->input('password'),
    ]);


   } 
}
