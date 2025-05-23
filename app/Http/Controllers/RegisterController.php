<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        return view('pages.auth.register', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required| min:3| max:255',
            'email' => 'required| email:dns| unique:users',
            'password' => 'required| min:5| max:255',
            'password_confirmation' => 'required| same:password',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('login')->with('success', 'Registration successful! Please login!');
    }
}
