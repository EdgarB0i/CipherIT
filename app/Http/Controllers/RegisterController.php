<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20|unique:users',
            'birthday' => 'required|date_format:d/m/Y',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|string|max:255',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'phone.required' => 'The phone field is required.',
            'phone.unique' => 'This phone number is already taken.',
            'birthday.required' => 'The birthday field is required.',
            'birthday.date_format' => 'Please enter a valid date in the format dd/mm/yyyy.',
            'gender.required' => 'The gender field is required.',
            'gender.in' => 'Please select a valid gender option.',
            'address.required' => 'The address field is required.'
        ]);
        
        
        // Parse birthday if provided
        $birthday = $request->input('birthday') ? Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->format('Y-m-d') : null;

        // Create a new user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'phone' => $request->phone, 
            'birthday' => $birthday,
            'gender' => $request->gender,
        ]);

        // Save the user to the database
        $user->save();

        return redirect('/')->with('success', 'Your account has been created successfully!');
    }
}
