<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundSystem;
use App\Models\Rental;
use App\Models\User;

class RentalController extends Controller
{
    public function create()
    {
        $soundSystems = SoundSystem::all();

        return view('rental.create', compact('soundSystems'));
    }

    public function store(Request $request)
    {
        // Validasi input, termasuk tanggal
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rental_date' => 'required|date_format:Y-m-d',
            'rental_start_time' => 'required|date_format:H:i',
            'rental_end_time' => 'required|date_format:H:i|after:rental_start_time',
            'event_name' => 'required|string|max:255',
            'event_address' => 'required|string|max:255',
            'name_location' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'sound_system_id' => 'required|exists:sound_systems,id',
        ]);

        // Create DateTime objects
        $startDateTime = \Carbon\Carbon::parse($request->input('rental_date') . ' ' . $request->input('rental_start_time'));
        $endDateTime = \Carbon\Carbon::parse($request->input('rental_date') . ' ' . $request->input('rental_end_time'));

        // Cek apakah sound system sudah terpesan dalam rentang waktu tertentu
        $existingRental = Rental::where('rental_date', $request->input('rental_date'))
            ->where(function ($query) use ($startDateTime, $endDateTime) {
                $query->whereBetween('rental_start_time', [$startDateTime, $endDateTime])
                    ->orWhereBetween('rental_end_time', [$startDateTime, $endDateTime]);
            })
            ->where('sound_system_id', $request->input('sound_system_id'))
            ->first();

        if ($existingRental) {
            return redirect()->route('rental.create')->with('error', 'Sound system sudah terpesan dalam rentang waktu tersebut.');
        }

        // Simpan data rental ke database
        $rental = Rental::create([
            'customer_name' => $request->input('customer_name'),
            'rental_date' => $request->input('rental_date'),
            'rental_start_time' => $startDateTime,
            'rental_end_time' => $endDateTime,
            'event_name' => $request->input('event_name'),
            'event_address' => $request->input('event_address'),
            'name_location' => $request->input('name_location'),
            'deskripsi' => $request->input('deskripsi'),
            'sound_system_id' => $request->input('sound_system_id'),
        ]);

        // Construct WhatsApp URL
        $whatsappUrl = "http://wa.me/+62895385894616?text=Thank%20you%20for%20your%20order!%20Here%20are%20the%20details:%0A%0A";
        $whatsappUrl .= "Customer%20Name:%20" . urlencode($rental->customer_name) . "%0A";
        $whatsappUrl .= "Event%20Name:%20" . urlencode($rental->event_name) . "%0A";
        $whatsappUrl .= "Event%20Address:%20" . urlencode($rental->event_address) . "%0A";
        $whatsappUrl .= "Location%20Name:%20" . urlencode($rental->name_location) . "%0A";
        $whatsappUrl .= "Event%20Rental%20Date:%20" . urlencode($rental->rental_date) . "%0A";
        $whatsappUrl .= "Event%20Rental%20Start%20Time:%20" . urlencode($rental->rental_start_time) . "%0A";
        $whatsappUrl .= "Event%20Rental%20End%20Time:%20" . urlencode($rental->rental_end_time) . "%0A";
        $whatsappUrl .= "Deskripsi:%20" . urlencode($rental->deskripsi) . "%0A";

        // Add more details as needed

        // Redirect to WhatsApp for confirmation
        return view('rental.konfirmasi', ['whatsappUrl' => $whatsappUrl]);
        
    } 

    public function konfirmasi(Request $request)
    {
        $whatsappUrl = $request->input('whatsappUrl');

        return view('rental.konfirmasi', compact('whatsappUrl'));
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $soundSystems = SoundSystem::all();
        
        return view('rental.edit', compact('rental', 'soundSystems'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data inputan jika diperlukan
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rental_date' => 'required|date_format:Y-m-d',
            'rental_start_time' => 'required|date_format:H:i',
            'rental_end_time' => 'required|date_format:H:i|after:rental_start_time',
            'event_name' => 'required|string|max:255',
            'event_address' => 'required|string|max:255',
            'name_location' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'sound_system_id' => 'required|exists:sound_systems,id',
        ]);

        $startDateTime = $request->input('rental_date') . ' ' . $request->input('rental_start_time');
        $endDateTime = $request->input('rental_date') . ' ' . $request->input('rental_end_time');
        
        // Find the rental record by ID
        $rental = Rental::findOrFail($id);

        // Update the rental record
        $rental->update([
            'customer_name' => $request->input('customer_name'),
            'rental_date' => $request->input('rental_date'),
            'rental_start_time' => $startDateTime,
            'rental_end_time' => $endDateTime,
            'event_name' => $request->input('event_name'),
            'event_address' => $request->input('event_address'),
            'name_location' => $request->input('name_location'),
            'deskripsi' => $request->input('deskripsi'),
            'sound_system_id' => $request->input('sound_system_id'),
        ]);

        // Redirect to index or show page
        return redirect()->route('rental.index')->with('success', 'Sound System updated successfully.');
    }

    public function index()
    {
        $rentals = Rental::with('soundSystem')->get(); // Menggunakan with untuk mengambil relasi soundSystem

        return view('rental.index', compact('rentals'));
    }

    public function complete($id)
    {
        // Temukan pemesanan berdasarkan ID
        $rental = Rental::findOrFail($id);

        // Pastikan pemesanan memiliki status 'Available'
        if ($rental->soundSystem->status === 'Available') {
            // Ubah status menjadi 'Rented'
            $rental->update(['status' => 'Rented']);

            // Tambahkan notifikasi atau pesan sukses
            return redirect()->route('rental.index')->with('success', 'Pemesanan berhasil diselesaikan.');
        } else {
            // Jika status bukan 'Available', tampilkan pesan error
            return redirect()->route('rental.index')->with('error', 'Pemesanan tidak dapat diselesaikan.');
        }
    }

    public function show($id)
    {
        // Find the rental by ID
        $rental = Rental::findOrFail($id);

        // Return a view with the rental data
        return view('rental.show', compact('rental'));
    }

    public function destroy($id)
    {
        $rentals = Rental::findOrFail($id);
    
        // Store the ID to use it for reordering
        $deletedId = $rentals->id;
    
        $rentals->delete();
    
        // Reorder IDs
        $this->reorderIds($deletedId);
    
        return redirect()->route('rental.index')->with('success', 'Data berhasil dihapus.');
    }
    
    // Function to reorder IDs
    private function reorderIds($deletedId)
    {
        // Decrement the 'id' column for all records with 'id' greater than $deletedId
        Rental::where('id', '>', $deletedId)->decrement('id');
    }
}
