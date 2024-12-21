<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
            session()->regenerate();
            return  to_route('admin.dashboard');
        }
        return redirect('/admin/login')->withErrors(['message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);
    }
    public function showCustomers()
    {
        $customers = Costumer::all();
        $admin = Auth::user();

        // Pass customers to the view
        return view('admin.costumer.index', compact('customers', 'admin'));
    }

    public function showSettings()
    {
        $admin = Auth::user();
        return view('admin.setting.index', compact('admin'));
    }

    // In AdminController.php
    public function updateSettings(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed|min:6',
        ]);

        $admin = Auth::user();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->input('password'));
        }

        $admin->save();

        return redirect()->route('admin.settings')->with('success', 'تم تحديث الإعدادات بنجاح');
    }



    // Show the admin dashboard
    public function dashboard()
    {
        $admin = Auth::user();
        return view('admin.dashboard.dashboard', compact('admin'));
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}