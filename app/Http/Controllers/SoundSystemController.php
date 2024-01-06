<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundSystem;


class SoundSystemController extends Controller
{
    public function index()
    {
        $soundSystems = SoundSystem::all();
        return view('admin.index', compact('soundSystems'));
    }

    public function show($id)
    {
        $soundSystem = SoundSystem::findOrFail($id);
        return view('admin.show', compact('soundSystem'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sound_code' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,rented',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);

            // Simpan data ke database
            SoundSystem::create([
                'gambar' => 'images/'.$imageName,
                'sound_code' => $request->sound_code,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'status' => $request->status,
            ]);
        // Redirect atau berikan respons sesuai kebutuhan
        
        return redirect()->route('admin.index')->with('success', 'Data berhasil disimpan.');
        }
        
        return redirect()->back()->with('error', 'Gambar wajib diunggah.');
    }

    public function edit($id)
    {
        $soundSystem = SoundSystem::findOrFail($id);
        return view('admin.edit', compact('soundSystem'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data inputan jika diperlukan
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sound_code' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'status' => 'required|in:available,rented',
        ]);

        // Update sound system
        $soundSystem = SoundSystem::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Upload gambar baru
            $gambarPath = $request->file('gambar')->store('public/images/');
            $soundSystem->gambar = 'images/sewa/'.basename($gambarPath);
        }

        $soundSystem->update([
            'sound_code' => $request->input('sound_code'),
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'status' => $request->input('status'),
        ]);

        // Redirect to index or show page
        return redirect()->route('admin.index')->with('success', 'Sound System updated successfully.');
    }

    public function destroy($id)
    {
        $soundSystem = SoundSystem::findOrFail($id);
    
        // Store the ID to use it for reordering
        $deletedId = $soundSystem->id;
    
        $soundSystem->delete();
    
        // Reorder IDs
        $this->reorderIds($deletedId);
    
        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus.');
    }
    
    // Function to reorder IDs
    private function reorderIds($deletedId)
    {
        // Decrement the 'id' column for all records with 'id' greater than $deletedId
        SoundSystem::where('id', '>', $deletedId)->decrement('id');
    }
}