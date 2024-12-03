<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request) {
        try {
            // Validate the input
            $request->validate([
                "userFirstName" => "required|string|max:30",
                "userLastName" => "required|string|max:30",
                "userEmail" => "required|string|email|max:80",
                "username" => "required|string|unique:users,username|max:30",
                "userPassword" => "required|string|max:80",
            ]);
        } catch (ValidationException $e) {
            // Output the validation errors
            Log::info('Validation Errors:', $e->errors()); // Log errors instead of dd
            return redirect()->back()->withErrors($e->errors());
        }



        User::create([
            "first_name" => $request->input("userFirstName"),
            "last_name" => $request->input("userLastName"),
            "username" => $request->input("username"),
            "email" => $request->input("userEmail"),
            "password" => Hash::make($request->input("userPassword")),
        ]);

        return redirect("/")->with("message", "User has been created");
    }

    public function login(Request $request) {
        try {
            // Validate the input
            $request->validate([
                "loginUserEmail" => "required|string|email|max:80",
                "loginUserPassword" => "required|string|max:80",
            ]);
        } catch (ValidationException $e) {
            // Output the validation errors
            Log::info('Validation Errors:', $e->errors()); // Log errors instead of dd
            return redirect()->back()->withErrors($e->errors());
        }

        if (Auth::attempt(['email' => $request->input('loginUserEmail'), 'password' => $request->input('loginUserPassword')])) {
            $request->session()->regenerate();
            return redirect()->intended("/")->with("username", Auth::user()->username);
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
