<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundSystem;
use App\Models\Rental;

class JadwalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('soundSystem')->get(); // Menggunakan with untuk mengambil relasi soundSystem

        return view('pages.jadwal', ['rentals' => $rentals]);
    }

    public function show()
    {
        $soundSystems = SoundSystem::select('gambar', 'status')->get();

        return view('pages.jadwal', compact('soundSystems'));
    }
}
