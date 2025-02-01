<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Exception;
use App\Models\User;

class UserController extends Controller
{
   public function userRegistration(Request $request)
   {
       // Validate the incoming data
       $request->validate([
           'firstname' => 'required|string|max:255',
           'lastname'  => 'required|string|max:255',
           'email'     => 'required|email|unique:users,email',
           'phone'     => 'required|string|max:15',
           'password'  => 'required|string|min:8|confirmed',  // password confirmation is optional
       ]);

       try {
           // Create a new user
           User::create([
               'firstname' => $request->input('firstname'),
               'lastname'  => $request->input('lastname'),
               'email'     => $request->input('email'),
               'phone'     => $request->input('phone'),
               'password'  => bcrypt($request->input('password')),  // Hash the password
           ]);

           return response()->json(['status' => "success", 'message' => 'User Created Successfully'], 201);
       } catch (\Exception $e) {
           return response()->json([
               'status' => "error",
               'message' => env('APP_DEBUG') ? $e->getMessage() : 'Something went wrong'
           ], 500);
       }
   }
}
