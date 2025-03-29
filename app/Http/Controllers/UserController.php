<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function showUserRegisteration()
    {
        return view('registeration');
    }


    public function register(Request $req)
    {
        $validated = $req->validate([
            'full_name' => 'required|min:2|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|confirmed',
            'phone' => 'required|digits:10|unique:users,phone',
            'address' => 'required|string|min:10|max:255|regex:/^[a-zA-Z0-9\s,.\-\/]+$/'


        ], [
            'full_name.required' => 'Full name is required!',
            'full_name.min' => 'Full name must be at least 2 characters long!',
            'full_name.regex' => 'Full name can only contain alphabets and spaces!',

            'email.required' => 'Email is required!',
            'email.email' => 'Please enter a valid email address!',
            'email.rfc' => 'Invalid email format! Please provide a correct email!',
            'email.unique' => 'This email is already registered!',

            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 8 characters long!',
            'password.regex' => 'Password must contain at least one uppercase letter, one number, and one special character (@$!%*?&)!',
            'password.confirmed' => 'Passwords do not match!',

            'phone.required' => 'Phone number is required!',
            'phone.digits' => 'Phone number must be exactly 10 digits!',
            'phone.unique' => 'This phone number is already registered!',

            'address.required' => 'Address is required!',
            'address.min' => 'Address must be at least 10 characters long!',
            'address.max' => 'Address cannot be longer than 255 characters!',
            'address.regex' => 'Address can only contain letters, numbers, spaces, commas, dots, hyphens, and slashes.',
        ]);


        $user = User::create(
            [
                'username' => Str::slug($validated['full_name'], '_') . "_" . rand(100000, 99999999),
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'role' => in_array($req->role, ['user', 'room_owner']) ? $req->role : 'user',
            ]
        );
        if ($user) {
            $message = "Registration Successful";
        }

        return view('welcome', ['message' => $message]);

    }
}
