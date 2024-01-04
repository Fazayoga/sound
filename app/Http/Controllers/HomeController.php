<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{

    public function index()
    {
        $admins = Home::select('name')->get();

        return view('admin.home', compact('admins'));
    }

    public function profil()
    {
        $admins = Home::select('name', 'email')->get();

        return view('admin.profil', compact('admins'));
    }

    public function home()
    {
        // Jika ingin mengambil informasi pengguna yang sedang login
        $admins = auth()->user();

        // Tampilkan halaman home dengan data pengguna
        return view('admin.home')->with('admins', $admins);
    }
}
