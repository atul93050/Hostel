<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function showRegisteration()
    {
        return view('user.registeration');
    }

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
            'password' => "required|confirmed",

        ]);


        $user = User::create(
            [
                'username' => $req->name . "_" . rand(100000, 99999999),
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'phone' => $req->phone,
                'created_at' => now(),
                'role' => $req->role ?? "user"
            ]
        );
        if($user){
            $message = "Registration Successful";
        }

        return view('welcome',['message'=>$message]);

    }
}
