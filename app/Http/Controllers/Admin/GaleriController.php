<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(20);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'foto'       => 'required|image|max:3072',
            'keterangan' => 'nullable|string|max:255',
            'tanggal'    => 'nullable|date',
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul'      => $request->judul,
            'foto'       => $path,
            'keterangan' => $request->keterangan,
            'tanggal'    => $request->tanggal,
            'is_active'  => true,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus!');
    }

    public function toggleActive(Galeri $galeri)
    {
        $galeri->update(['is_active' => !$galeri->is_active]);
        return redirect()->back()->with('success', 'Status foto diperbarui!');
    }
}
