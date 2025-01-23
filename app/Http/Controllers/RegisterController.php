<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required| min:3| max:255',
            'email' => 'required| email:dns| unique:users',
            'password' => 'required| min:5| max:255',
            'password_confirmation' => 'required| same:password',
            'gender' => 'required| in:male,female',
            'phone_number' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/| max:15'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect('/')->with('success', 'Registered Successfully, Please Login');
    }
}
