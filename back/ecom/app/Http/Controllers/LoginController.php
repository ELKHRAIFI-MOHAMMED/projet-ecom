<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request ){
         $credentials =User::where('email','moahmed@mohamed.com')->first();
        // return ($credentials);
        // $credentials = [
        //     'email' => 'moahmed@mohamed.com'
        // ];

        if($credentials){

            Auth::login($credentials, $remember = true);
            //$token = $credentials->createToken($credentials->token_name);
            return ['token' => '$token->plainTextToken','user'=>Auth::user()];



        }
        return 'no';
     }

     public function test(){
        return Auth::user();
     }
}
