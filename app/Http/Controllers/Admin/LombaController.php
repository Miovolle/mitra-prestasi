<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    public function index()
    {
        $lomba = Lomba::latest()->paginate(15);
        return view('admin.lomba.index', compact('lomba'));
    }

    public function create()
    {
        return view('admin.lomba.form');
    }

    public function store(Request $request)
    {
        $validated = $this->validateLomba($request);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('lomba', 'public');
        }

        Lomba::create($validated);
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil ditambahkan!');
    }

    public function edit(Lomba $lomba)
    {
        return view('admin.lomba.form', compact('lomba'));
    }

    public function update(Request $request, Lomba $lomba)
    {
        $validated = $this->validateLomba($request);

        if ($request->hasFile('poster')) {
            if ($lomba->poster) Storage::disk('public')->delete($lomba->poster);
            $validated['poster'] = $request->file('poster')->store('lomba', 'public');
        }

        $lomba->update($validated);
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil diperbarui!');
    }

    public function destroy(Lomba $lomba)
    {
        if ($lomba->poster) Storage::disk('public')->delete($lomba->poster);
        $lomba->delete();
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil dihapus!');
    }

    private function validateLomba(Request $request): array
    {
        return $request->validate([
            'nama'            => 'required|string|max:255',
            'penyelenggara'   => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'kategori'        => 'nullable|string',
            'tingkat'         => 'nullable|string',
            'status'          => 'required|in:open,closed,coming',
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'lokasi'          => 'nullable|string|max:255',
            'hadiah'          => 'nullable|string|max:255',
            'poster'          => 'nullable|image|max:2048',
            'link_daftar'     => 'nullable|url',
            'is_featured'     => 'boolean',
        ]);
    }
}
