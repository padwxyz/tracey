<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('dashboard-admin');
                case 'user':
                    return redirect()->route('dashboard-user');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('failed', 'Unrecognized role!');
            }
        }

        return back()->with('failed', 'Login failed! Please check your email or password!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing-page')->with('success', 'Successfully logged out!');
    }
}
