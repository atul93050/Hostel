<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('user.login');

    }
    public function login(Request $req)
    {
        $validate = $req->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate) {
            // Get the user by email
            $user = User::where('email', $req->username)->first();

            // Check if user exists
            if (!$user) {
                return view('welcome', ['message' => "User not found"]);
            }

            // Verify password
            if (Hash::check($req->password, $user->password)) {
                return view('welcome', ['message' => "User login successful"]);
            } else {
                return view('welcome', ['message' => "User login unsuccessful"]);
            }
        }
    }
}
