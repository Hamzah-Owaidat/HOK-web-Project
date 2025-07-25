<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView(){
        return view('Auth.login');
    }

    public function registerView(){
        return view('Auth.register');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login_view'))->with('error', 'Invalid Credentials');
    }

    public function registerPost(Request $request){
        $request->validate([
            'username' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            // 'confirm_password' => 'required',
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // If user is successfully created, redirect
        if ($user) {
            return redirect()->route('login_view')->with('success', 'Registration successful! Please log in.');
        } else {
            return redirect()->back()->with('error', 'Failed to register. Please try again.');
        }
    }

    public function destroy(Request $request){
        Auth::logout();

        // Reset locale to English
        $request->session()->put('locale', 'en');

        return redirect()->route('login_view');

    }
}
