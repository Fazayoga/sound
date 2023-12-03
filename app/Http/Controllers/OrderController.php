<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundSystem;


class OrderController extends Controller
{
    public function index()
    {
        $soundSystems = SoundSystem::select('gambar', 'judul', 'deskripsi', 'harga', 'status')->get();

        return view('pages.order', compact('soundSystems'));
    }
    
}
