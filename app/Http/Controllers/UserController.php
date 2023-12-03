<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Misalnya, dapatkan nama admin dari data autentikasi
        $adminName = auth()->user()->name;

        // Kirim nama admin ke tampilan
        return view('home', ['adminName' => $adminName]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
