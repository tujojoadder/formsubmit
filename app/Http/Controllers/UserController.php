<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function register(Request $request)
    {

        $validatedData = $request->validate([
            'newspaper_name' => 'required|string|max:255',
            'reference_code' => 'nullable|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'current_address' => 'nullable|string|max:500',
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:6',
            'applied_position' => 'required|string|max:100',
            'working_place' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'portfolio_link' => 'nullable|url|max:255',
            'cover_letter' => 'nullable|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:5120', // 5MB
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048', // 2MB
        ]);
        /* file handling */

        $cvPath = $request->file('cv')->store('uploads/cv', 'public');
        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('uploads/photos', 'public')
            : null;

        $user = User::create([
            'newspaper_name' => $validatedData['newspaper_name'],
            'reference_code' => $validatedData['reference_code'] ?? null,
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'current_address' => $validatedData['current_address'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'applied_position' => $validatedData['applied_position'],
            'working_place' => $validatedData['working_place'],
            'education' => $validatedData['education'],
            'experience_years' => $validatedData['experience_years'],
            'portfolio_link' => $validatedData['portfolio_link'] ?? null,
            'cover_letter' => $validatedData['cover_letter'] ?? null,
            'cv' => $cvPath,
            'photo' => $photoPath,
        ]);


        return redirect()->back()->with('success', 'আপনার আবেদনটি গৃহীত হয়েছে। অনুগ্রহ করে আপনার ইউজারনেম ও পাসওয়ার্ড ব্যবহার করে লগইন করুন।');
    }


    function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)
            ->orWhere('phone', $request->username)
            ->first();

        if ($user && Auth::guard('web')->attempt(['username' => $user->username, 'password' => $request->password])) {
            return redirect()->intended('/dashboard')->with('success', 'লগইন সফল হয়েছে।');
        }

        return back()->with('error', 'ইউজার নেম/ফোন বা পাসওয়ার্ড ভুল হয়েছে।')->withInput();
    }


    public function dashboard()
    {

        return view('dashboard', ['user' => auth()->user()]);
    }


    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'আপনি সফলভাবে লগআউট হয়েছেন।');
    }
}