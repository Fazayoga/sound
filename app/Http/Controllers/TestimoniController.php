<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testi;

class TestimoniController extends Controller
{
    public function index()
    {
        $testi = Testi::select('video', 'judul', 'deskripsi')->get();

        return view('testi.index', compact('testi'));
    }
}
