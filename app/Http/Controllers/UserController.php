<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    function register(Request $req)
//    {
//        $name = $req->input('name');
//        $email = $req->input('email');
//        $password = Hash::make($req->input('password'));
//        User::create([
//            'name' =>   $name,
//            'email' =>  $email ,
//            'password'=> $password
//        ]);
//    }
//
//    function login(Request $req)
//    {
//        $email =  $req->input('email');
//        $password = $req->input('password');
//
//        $user = User::where('email',$email)->first();
//        if(!Hash::check($password, $user->password))
//        {
//            echo "Not Matched";
//        }
//        else
//        {
//            echo $user->email;
//        }
//    }
}
