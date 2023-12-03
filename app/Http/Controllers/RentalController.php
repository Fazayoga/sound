<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundSystem;
use App\Models\Rental;

class RentalController extends Controller
{
    public function create()
    {
        $soundSystems = SoundSystem::all();

        return view('rental.create', ['soundSystems' => $soundSystems]);
    }

    public function store(Request $request)
    {
        // Validasi input, termasuk tanggal
        $request->validate([
            'sound_system_id' => 'required|exists:sound_systems,id',
            'rental_date' => 'required|date',
            'rental_time' => 'required', // Add validation for time
        ]);

        // Combine date and time into a single DateTime string
        $dateTimeString = $request->input('rental_date') . ' ' . $request->input('rental_time');

        // Cek apakah sound system sudah terpesan pada tanggal tertentu
        $existingRental = Rental::where('rental_date', $request->input('rental_date'))
                                ->where('rental_time', $request->input('rental_time'))
                                ->where('sound_system_id', $request->input('sound_system_id'))
                                ->first();

        if ($existingRental) {
            return redirect()->route('rental.create')->with('error', 'Sound system sudah terpesan pada tanggal dan waktu tersebut.');
        }

        // Simpan data rental ke database
        Rental::create([
            'rental_date' => $request->input('rental_date'),
            'rental_time' => $request->input('rental_time'),
            'sound_system_id' => $request->input('sound_system_id'),
        ]);

        // Tambahkan notifikasi atau pesan sukses
        return redirect()->route('pages.order')->with('success', 'Persewaan berhasil ditambahkan.');
    }


    public function index()
    {
        $rentals = Rental::with('soundSystem')->get(); // Menggunakan with untuk mengambil relasi soundSystem

        return view('rental.index', ['rentals' => $rentals]);
    }
}
