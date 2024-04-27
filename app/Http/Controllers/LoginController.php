<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'name' => 'One or more credentials do not match.',
            'email' => 'One or more credentials do not match.',
            'password' => 'One or more credentials do not match.',

        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
