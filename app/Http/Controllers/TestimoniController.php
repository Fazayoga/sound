<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testi;

class TestimoniController extends Controller
{
    public function index()
    {
        $testi = Testi::all();
        return view('admin.testi', compact('testi'));
    }
}
