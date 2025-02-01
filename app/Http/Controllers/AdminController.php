<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        $title = 'Admin Management Data';
        return view('pages.admin.master_data.admin_data', compact('admin', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Admin',
            'password' => 'required|string|min:8',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('Success', 'Admin created successfully!');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Admin,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return redirect()->back()->with('Success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with('Success', 'Admin deleted successfully!');
    }
}
