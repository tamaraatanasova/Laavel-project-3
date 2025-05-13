<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.loginForm');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('homepage');
    }
}
