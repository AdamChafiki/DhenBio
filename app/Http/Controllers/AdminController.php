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