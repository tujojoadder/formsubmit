<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showLogin()
    {
        return view('admin.login');
    }



    public function index()
    {

        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.admin-dashboard', compact('users'));
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin-dashboard')->with('success', 'Welcome Admin!');
        }

        return back()->with('error', 'ইমেইল বা পাসওয়ার্ড ভুল হয়েছে।')->withInput();
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // User খুঁজে আনা
        $user = User::findOrFail($id);

        // Validation
        $validatedData = $request->validate([
            'newspaper_name' => 'nullable|string|max:255',
            'reference_code' => 'nullable|string|max:255',
            'full_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $id,
            'phone'          => 'nullable|string|max:20',
            'username'       => 'required|string|max:50|unique:users,username,' . $id,
            'experience_years' => 'nullable|integer|min:0',
            'status'         => 'required|in:pending,approved,rejected',

        ]);

        // Update করা
        $user->update($validatedData);

        // Success message সহ redirect
        return redirect()->route('admin.dashboard')->with('success', 'তথ্যটি সফলভাবে হালনাগাদ করা হয়েছে!');
    }





    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
