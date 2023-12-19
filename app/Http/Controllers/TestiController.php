<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testi;

class TestiController extends Controller
{
    public function index()
    {
        $testi = Testi::all();
        return view('admin.testi', compact('testi'));
    }

    public function show($id)
    {
        $testi = Testi::findOrFail($id);
        return view('testi.show-testi', compact('test'));
    }

    public function create()
    {
        return view('testi.create-testi');
    }

    
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:20480', // Sesuaikan ekstensi dan ukuran file video
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time().'.'.$video->extension();
            $video->move(public_path('videos'), $videoName);

            // Simpan data ke database
            Testi::create([
                'video' => 'videos/'.$videoName,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        // Redirect atau berikan respons sesuai kebutuhan
        
        return redirect()->route('testi.index')->with('success', 'Data berhasil disimpan.');
        }
        
        return redirect()->back()->with('error', 'Gambar wajib diunggah.');
    }

    public function edit($id)
    {
        $testi = Testi::findOrFail($id);
        return view('testi.edit-testi', compact('testi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data inputan jika diperlukan
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:20480', // Sesuaikan ekstensi dan ukuran file video
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Update sound system
        $testi = Testi::findOrFail($id);

        if ($request->hasFile('video')) {
            // Upload video baru
            $videoPath = $request->file('video')->store('public/videos/');
            $testi->video = 'videos/'.basename($videoPath);
        }

        $testi->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // Redirect to index or show page
        return redirect()->route('testi.index')->with('success', 'Sound System updated successfully.');
    }

    public function destroy($id)
    {
        $testi = Testi::findOrFail($id);
    
        // Store the ID to use it for reordering
        $deletedId = $testi->id;
    
        $testi->delete();
    
        // Reorder IDs
        $this->reorderIds($deletedId);
    
        return redirect()->route('testi.index')->with('success', 'Data berhasil dihapus.');
    }
    
    // Function to reorder IDs
    private function reorderIds($deletedId)
    {
        // Decrement the 'id' column for all records with 'id' greater than $deletedId
        Testi::where('id', '>', $deletedId)->decrement('id');
    }
}
