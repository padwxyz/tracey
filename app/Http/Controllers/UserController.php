<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $title = 'User Management Data';
        return view('', compact('users', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required| in:male,female',
            'phone_number' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/| max:15'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'gender' => $validated['gender'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->back()->with('Success', 'User created successfully!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'gender' => 'required| in:male,female',
            'phone_number' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/| max:15'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->gender = $validated['gender'];
        $user->phone_number = $validated['phone_number'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('Success', 'User updated successfully!');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('Success', 'User deleted successfully!');
    }
}
