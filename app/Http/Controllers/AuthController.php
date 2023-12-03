<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('access-admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('home'); // Sesuaikan dengan rute atau URL yang sesuai
        }
    
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showRegistrationForm()
    {
        return view('access-admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins', // Ganti 'users' menjadi 'admins'
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($admins);

        return redirect()->intended('/home');
    }

    public function showHomePage()
    {
        // Mengambil data admin yang sedang login
        $admins = Auth::user();

        return view('/home')->with('admin', $admins);
    }
}
